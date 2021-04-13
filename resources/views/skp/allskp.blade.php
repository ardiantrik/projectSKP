@extends('layout/main')

@section('title', 'Students')

@section('pageName')
    <h1>Halaman Manajemen SKP</h1>
@endsection

@section('breadCrumb')
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active">Manajemen SKP</li>
@endsection

@section('container')
<button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modal-formSKP">
    <i class="fas fa-plus"></i>&nbsp;Tambah SKP
</button>

@if (session('status')=='success_create')
    <div class="alert alert-success text-center">Data berhasil ditambahkan!</div>
@elseif(session('status')=='failed_create')
    <div class="alert alert-danger text-center">Data gagal ditambahkan!</div>
@endif

@if (session('status')=='success_delete')
    <div class="alert alert-success text-center">Data berhasil dihapus!</div>
@elseif(session('status')=='failed_delete')
    <div class="alert alert-danger text-center">Data gagal dihapus!</div>
@endif

@if (session('status')=='success_edit')
    <div class="alert alert-success text-center">Data berhasil diubah!</div>
@elseif(session('status')=='failed_edit')
    <div class="alert alert-danger text-center">Data gagal diubah!</div>
@endif


<table id="tabelskp" class="table table-bordered table-striped text-center" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>Bidang</th>
                <th>Sub-Bidang</th>
                <th>Posisi</th>
                <th>Tugas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($jobdesc as $jobdesc)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $jobdesc->nama_bidang }}</td>
                <td>{{ $jobdesc->nama_subbidang }}</td>
                <td>{{ $jobdesc->nama_jabatan }}</td>
                <td>{{ $jobdesc->tugas }}</td>
                <td>
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-formEditJobdescid{{ $jobdesc->id }}"><i class="fas fa-edit"></i>&nbsp;Edit</button>
                    <form action="/jobdescription/{{ $jobdesc->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>&nbsp;Hapus</button>
                    </form>

                </td>
            </tr>

            <div class="modal fade" id="modal-formEditJobdescid{{ $jobdesc->id }}">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Form Edit Job Description</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>


                    <form method="post" action="/jobdescription/{{ $jobdesc->id }}" >
                        @method('put')
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="uraian_jobdesc">Uraian Job Description</label>
                                <input type="text" class="form-control @error('uraian_jobdesc') is-invalid @enderror" id="uraian_jobdesc" name="uraian_jobdesc" placeholder="Masukkan Jobdesc" value="{{ $jobdesc->tugas }}">
                                @error('uraian_jobdesc')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            @endforeach
        </tbody>
        <tfoot class="thead-dark">
        <tr>
                <th>No.</th>
                <th>Bidang</th>
                <th>Sub-Bidang</th>
                <th>Posisi</th>
                <th>Tugas</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>


    <div class="modal fade" id="modal-formSKP">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Form Tambah SKP</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>


            <form method="post" action="/jobdescription" >
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="jabatan_id">Pilih Jabatan</label>
                        <select name="jabatan_id" id="jabatan_id" class="form-control select2bs4" style="width: 100%;">
                            @foreach($jabatan as $jbtn)
                                <option value="{{ $jbtn->id }}">{{ $jbtn->nama_bidang }}-{{ $jbtn->nama_jabatan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="uraian_jobdesc">Uraian Job Description</label>
                        <input type="text" class="form-control @error('uraian_jobdesc') is-invalid @enderror" id="uraian_jobdesc" name="uraian_jobdesc" placeholder="Masukkan Jobdesc" value="{{ old('uraian_jobdesc') }}">
                        @error('uraian_jobdesc')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endsection
