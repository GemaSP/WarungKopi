@extends('backend.v_layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel {{ $judul }}</h1>
    <p class="mb-4">DataTables adalah plugin pihak ketiga yang digunakan untuk menghasilkan tabel dibawah ini.
        Untuk informasi lebih lanjut mengenai DataTables, Mohon Kunjungi <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <button type="button" data-toggle="modal" data-target="#tambahModal" class="d-none d-sm-inline-block btn btn-sm btn-primary btn-icon-split shadow-sm mb-4">
        <span class="icon text-white-50"><i class="fas fa-plus fa-sm"></i></span>
        <span class="text">Tambah Kategori</span>
    </button>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data {{ $judul }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($kategori as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_kategori }}</td>
                            <td>

                                <form action="{{ route('backend.kategori.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" data-toggle="modal" data-target="#ubahModal{{ $item->id }}" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        <span class="text">Ubah</span>
                                    </button>
                                    <button class="btn btn-danger btn-icon-split show_confirm" data-konf-delete="{{ $item->nama_kategori }}">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">Hapus</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('backend.v_kategori.create')
    @include('backend.v_kategori.edit')
</div>
<!-- /.container-fluid -->
@endsection