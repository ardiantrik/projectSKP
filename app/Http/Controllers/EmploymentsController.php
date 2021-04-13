<?php

namespace App\Http\Controllers;

use App\Models\Employment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmploymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = DB::table('employments')
            ->join('subdepartments', 'employments.subbidang_id', '=', 'subdepartments.id')
            ->join('departments', 'subdepartments.bidang_id', '=', 'departments.id')
            ->select('employments.*', 'subdepartments.nama_subbidang', 'departments.nama_bidang')
            ->get();

            $subbidang = DB::table('subdepartments')
            ->join('departments', 'subdepartments.bidang_id', '=', 'departments.id')
            ->select('subdepartments.*', 'departments.nama_bidang')
            ->get();

        // return $jabatan;
        return view('bidang.subbidang.jabatan.alljabatan', [
            'jabatan' => $jabatan,
            'subbidang' => $subbidang
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
            'nama_jabatan' => 'required'
        ]);

        $res = Employment::create($request->all());

        if ($res!=NULL && $checkcek!=NULL) {
            return redirect('/subdepartment/'.$request->subbidang_id)->with('status', 'success_create');
        }else{
            return redirect('/subdepartment/'.$request->subbidang_id)->with('status', 'failed_create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employment  $employment
     * @return \Illuminate\Http\Response
     */
    public function show(Employment $employment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employment  $employment
     * @return \Illuminate\Http\Response
     */
    public function edit(Employment $employment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employment  $employment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employment $employment)
    {
        $subbidang_id = $employment->subbidang_id;
        $checkcek = $request->validate([
            'nama_jabatan' => 'required'
        ]);


        $res = Employment::where('id',$employment->id)->
        update([
            'nama_jabatan' => $request->nama_jabatan
        ]);

        // dd($res);

        if ($res!=NULL) {
            return redirect('/subdepartment/'.$subbidang_id)->with('status', 'success_edit');
        }else{
            return redirect('/subdepartment/'.$subbidang_id)->with('status', 'failed_edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employment  $employment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employment $employment)
    {
        $res = Employment::destroy($employment->id);
        $subbidang_id = $employment->subbidang_id;
        if ($res!=0) {
            return redirect('/department/'.$subbidang_id)->with('status', 'success_delete');
        }else{
            return redirect('/department/'.$subbidang_id)->with('status', 'failed_delete');
        }
    }
}
