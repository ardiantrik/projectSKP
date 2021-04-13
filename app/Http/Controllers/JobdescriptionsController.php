<?php

namespace App\Http\Controllers;

use App\Models\Jobdescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobdescriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobdesc = DB::table('jobdescriptions')
            ->join('employments', 'jobdescriptions.jabatan_id', '=', 'employments.id')
            ->join('subdepartments', 'employments.subbidang_id', '=', 'subdepartments.id')
            ->join('departments', 'subdepartments.bidang_id', '=', 'departments.id')
            ->select('jobdescriptions.*', 'employments.nama_jabatan','subdepartments.nama_subbidang','departments.nama_bidang')
            ->get();

        $jabatan = DB::table('employments')
            ->join('subdepartments', 'employments.subbidang_id', '=', 'subdepartments.id')
            ->join('departments', 'subdepartments.bidang_id', '=', 'departments.id')
            ->select('employments.id','employments.nama_jabatan', 'subdepartments.nama_subbidang', 'departments.nama_bidang')
            ->get();

        return view('skp.allskp', [
            'jobdesc' => $jobdesc,
            'jabatan' => $jabatan
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
            'uraian_jobdesc' => 'required'
        ]);

        // $res = Jobdescription::create($request->all());
        $res = Jobdescription::create([
            'tugas' => $request->uraian_jobdesc,
            'jabatan_id'=> $request->jabatan_id
        ]);

        if ($res!=NULL && $checkcek!=NULL) {
            return redirect('/jobdescription')->with('status', 'success_create');
        }else{
            return redirect('/jobdescription')->with('status', 'failed_create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jobdescription  $jobdescription
     * @return \Illuminate\Http\Response
     */
    public function show(Jobdescription $jobdescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jobdescription  $jobdescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Jobdescription $jobdescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jobdescription  $jobdescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jobdescription $jobdescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jobdescription  $jobdescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jobdescription $jobdescription)
    {
        //
    }
}
