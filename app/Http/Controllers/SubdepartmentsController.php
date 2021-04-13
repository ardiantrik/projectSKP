<?php

namespace App\Http\Controllers;

use App\Models\Subdepartment;
use App\Models\Employment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubdepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $subbidang = Subdepartment::all('id','nama_subbidang',);
        // return view('bidang.subbidang.subbidang', ['subbidang' => $subbidang]);

        $subbidang = DB::table('subdepartments')
            ->join('departments', 'subdepartments.bidang_id', '=', 'departments.id')
            ->select('subdepartments.*', 'departments.nama_bidang')
            ->get();

        $bidang = DB::table('departments')->get();

        return view('bidang.subbidang.allsubbidang', [
            'subbidang' => $subbidang,
            'bidang' => $bidang
        ]);
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
            'nama_subbidang' => 'required'
        ]);

        $res = Subdepartment::create($request->all());

        if ($res!=NULL && $checkcek!=NULL) {
            return redirect('/department/'.$request->bidang_id)->with('status', 'success_create');
        }else{
            return redirect('/department/'.$request->bidang_id)->with('status', 'failed_create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subdepartment  $subdepartment
     * @return \Illuminate\Http\Response
     */
    public function show(Subdepartment $subdepartment)
    {
        // echo "halo";
        $jabatan = Employment::all('id','nama_jabatan','subbidang_id')->where('subbidang_id',$subdepartment->id);
        return view('bidang.subbidang.jabatan.jabatan', [
            'jabatan' => $jabatan,
            'subbidang' => $subdepartment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subdepartment  $subdepartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Subdepartment $subdepartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subdepartment  $subdepartment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subdepartment $subdepartment)
    {
        $bidang_id = $subdepartment->bidang_id;
        $checkcek = $request->validate([
            'nama_subbidang' => 'required'
        ]);


        $res = Subdepartment::where('id',$subdepartment->id)->
        update([
            'nama_subbidang' => $request->nama_subbidang
        ]);


        if ($res!=NULL) {
            return redirect('/department/'.$bidang_id)->with('status', 'success_edit');
        }else{
            return redirect('/department/'.$bidang_id)->with('status', 'failed_edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subdepartment  $subdepartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subdepartment $subdepartment)
    {
        $res = Subdepartment::destroy($subdepartment->id);
        $bidang_id = $subdepartment->bidang_id;
        if ($res!=0) {
            return redirect('/department/'.$bidang_id)->with('status', 'success_delete');
        }else{
            return redirect('/department/'.$bidang_id)->with('status', 'failed_delete');
        }
    }
}
