@extends('layout/main')

@section('title', 'Jabatan')

@section('pageName')
    <h1>Halaman Manajemen Jabatan</h1>
    <h4>Sub-Bidang : {{ $subbidang->nama_subbidang }}<h4>

@endsection

@section('breadCrumb')
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item"><a href="/department">...</a></li>
    <li class="breadcrumb-item"><a href="/department/{{ $subbidang->bidang_id }}">Manajemen Sub-Bidang</a></li>
    <li class="breadcrumb-item active">Manajemen Jabatan</li>
@endsection

@section('container')
<button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modal-formJabatan">
    <i class="fas fa-plus"></i>&nbsp;Tambah Jabatan
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
                <th>Nama Jabatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jabatan as $jbtn)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $jbtn->nama_jabatan }}</td>
                <td>
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-formEditJabatanid{{ $jbtn->id }}"><i class="fas fa-edit"></i>&nbsp;Edit</button>
                    <form action="/employment/{{ $jbtn->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>&nbsp;Hapus</button>
                    </form>

                </td>
            </tr>

            <div class="modal fade" id="modal-formEditJabatanid{{ $jbtn->id }}">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Form Edit Sub-Bidang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>


                    <form method="post" action="/employment/{{ $jbtn->id }}" >
                        @method('put')
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_subbidang">Nama Jabatan</label>
                                <input type="text" class="form-control @error('nama_jabatan') is-invalid @enderror" id="nama_jabatan" name="nama_jabatan" placeholder="Masukkan Jabatan" value="{{ $jbtn->nama_jabatan }}">
                                @error('nama_jabatan')
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
                <th>Nama Sub-Bidang</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>


    <div class="modal fade" id="modal-formJabatan">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Form Tambah Jabatan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>


            <form method="post" action="/employment" >
                @csrf
                <input type="hidden" name="subbidang_id" id="subbidang_id" value="{{ $subbidang->id }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_jabatan">Nama Jabatan</label>
                        <input type="text" class="form-control @error('nama_jabatan') is-invalid @enderror" id="nama_jabatan" name="nama_jabatan" placeholder="Masukkan Jabatan" value="{{ old('nama_jabatan') }}">
                        @error('nama_jabatan')
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
