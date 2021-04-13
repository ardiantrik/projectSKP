<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Subdepartment;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bidang = Department::all('id','nama_bidang');
        return view('bidang.bidang', ['bidang' => $bidang]);
        // return $bidang;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $checkcek = $request->validate([
            'nama_bidang' => 'required'
        ]);

        // $res = Department::create([
        //     'nama_bidang' => $request->nama_bidang
        // ]);

        $res = Department::create($request->all());

        if ($res!=NULL && $checkcek!=NULL) {
            return redirect('/department')->with('status', 'success_create');
        }else{
            return redirect('/department')->with('status', 'failed_create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        $subbidang = Subdepartment::all('id','nama_subbidang','bidang_id')->where('bidang_id',$department->id);
        // dd($department->nama_bidang);
        return view('bidang.subbidang.subbidang', [
            'subbidang' => $subbidang,
            'bidang' => $department
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $checkcek = $request->validate([
            'nama_bidang' => 'required'
        ]);


        $res = Department::where('id',$department->id)->
        update([
            'nama_bidang' => $request->nama_bidang
        ]);


        if ($res!=NULL) {
            return redirect('/department')->with('status', 'success_edit');
        }else{
            return redirect('/department')->with('status', 'failed_edit');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $res = Department::destroy($department->id);
        // echo $department;
        if ($res!=0) {
            return redirect('/department')->with('status', 'success_delete');
        }else{
            return redirect('/department')->with('status', 'failed_delete');
        }

    }
}
