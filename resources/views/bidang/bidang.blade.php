@extends('layout/main')

@section('title', 'Bidang')

@section('pageName')
    <h1>Halaman Manajemen Bidang</h1>
@endsection

@section('breadCrumb')
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active">Manajemen Bidang</li>
@endsection

@section('container')
<button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modal-formBidang">
    <i class="fas fa-plus"></i>&nbsp;Tambah Bidang
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
                <th>Nama Bidang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bidang as $bdg)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $bdg->nama_bidang }}</td>
                <td>
                    <a href="/department/{{ $bdg->id }}" class="btn btn-primary btn-sm"><i class="fas fa-info-circle"></i></i>&nbsp;Sub-Bidang</a>
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-formEditBidangid{{ $bdg->id }}"><i class="fas fa-edit"></i>&nbsp;Edit</button>
                    <form action="/department/{{ $bdg->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>&nbsp;Hapus</button>
                    </form>

                </td>
            </tr>

            <div class="modal fade" id="modal-formEditBidangid{{ $bdg->id }}">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Form Edit Bidang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>


                    <form method="post" action="/department/{{ $bdg->id }}" >
                        @method('put')
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_bidang">Nama Bidang</label>
                                <input type="text" class="form-control @error('nama_bidang') is-invalid @enderror" id="nama_bidang" name="nama_bidang" placeholder="Masukkan Bidang" value="{{ $bdg->nama_bidang }}">
                                @error('nama_bidang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
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
                <th>Nama Bidang</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>


    <div class="modal fade" id="modal-formBidang">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Form Tambah Bidang</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>


            <form method="post" action="/department" >
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_bidang">Nama Bidang</label>
                        <input type="text" class="form-control @error('nama_bidang') is-invalid @enderror" id="nama_bidang" name="nama_bidang" placeholder="Masukkan Bidang" value="{{ old('nama_bidang') }}">
                        @error('nama_bidang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


@endsection
