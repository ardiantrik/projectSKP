@extends('layout/main')

@section('title', 'Sub-Bidang')

@section('pageName')
    <h1>Halaman Manajemen Sub-Bidang</h1>
    <h4>Bidang : {{ $bidang->nama_bidang }}<h4>

@endsection

@section('breadCrumb')
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item"><a href="/department">Manajemen Bidang</a></li>
    <li class="breadcrumb-item active">Manajemen Sub-Bidang</li>
@endsection

@section('container')
<button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modal-formSubbidang">
    <i class="fas fa-plus"></i>&nbsp;Tambah Sub-Bidang
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
                <th>Nama Sub-Bidang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subbidang as $subbdg)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $subbdg->nama_subbidang }}</td>
                <td>
                    <a href="/subdepartment/{{ $subbdg->id }}" class="btn btn-primary btn-sm"><i class="fas fa-user-tag"></i>&nbsp;Jabatan</a>
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-formEditSubbidangid{{ $subbdg->id }}"><i class="fas fa-edit"></i>&nbsp;Edit</button>
                    <form action="/subdepartment/{{ $subbdg->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>&nbsp;Hapus</button>
                    </form>

                </td>
            </tr>

            <div class="modal fade" id="modal-formEditSubbidangid{{ $subbdg->id }}">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Form Edit Sub-Bidang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>


                    <form method="post" action="/subdepartment/{{ $subbdg->id }}" >
                        @method('put')
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_subbidang">Nama Sub-Bidang</label>
                                <input type="text" class="form-control @error('nama_subbidang') is-invalid @enderror" id="nama_subbidang" name="nama_subbidang" placeholder="Masukkan Sub-Bidang" value="{{ $subbdg->nama_subbidang }}">
                                @error('nama_subbidang')
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


    <div class="modal fade" id="modal-formSubbidang">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Form Tambah Sub-Bidang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>


            <form method="post" action="/subdepartment" >
                @csrf
                <input type="hidden" name="bidang_id" id="bidang_id" value="{{ $bidang->id }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_subbidang">Nama Bidang</label>
                        <input type="text" class="form-control @error('nama_subbidang') is-invalid @enderror" id="nama_subbidang" name="nama_subbidang" placeholder="Masukkan Sub-Bidang" value="{{ old('nama_subbidang') }}">
                        @error('nama_subbidang')
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
