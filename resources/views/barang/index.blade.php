@extends('layouts.master')
@section('title', 'POS - Data Barang')
@section('pagetitle')
    <h1>Data Barang</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <a href="{{ route('create_barang') }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>Tambah Data</a>
           <hr>
           <div class="card">
               <div class="card-body">
                @if (session('message'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>x</span>
                        </button>
                        {{ session('message') }}
                    </div>
                </div>
                @elseif (session('delete'))
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>x</span>
                        </button>
                        {{ session('delete') }}
                    </div>
                </div>
                @endif
           <table id="table" class="table table-striped table-bordered table-md">
               <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Tanggal Masuk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Merek</th>
                    <th>Distributor</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
               </thead>
               <tbody>
                @foreach ($data as $item)
                <tr> 
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kd_barang }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->tanggal_masuk }}</td>
                    <td>{{ $item->harga_barang }}</td>
                    <td>{{ $item->stok_barang }}</td>
                    <td>{{ $item->merek->merek }}</td>
                    <td>{{ $item->distributor->nama_distributor }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <a href="{{url('edit_barang', $item->id)}}" class="badge badge-success">Edit</a>
                        <a href="{{url('delete_barang', $item->id)}}" onclick="return confirm('Yakin hapus data?')" class="badge badge-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
               </tbody>
           </table>
               </div>
           </div>
        </div>
    </div>
</div>
@endsection

@push('page-scripts')
  {{-- <script src="{{ asset('../node_modules/sweetalert/dist/sweetalert.min.js') }}"></script> --}}
@endpush

@push('after-script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>
@endpush