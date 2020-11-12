@extends('layouts.master')
@section('title', 'POS - Data Transaksi')
@section('pagetitle')
    <h1>Data Transaksi</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <a href="{{ route('transaksi') }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>Transaksi Baru</a>
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
                    <th>Kode Transaksi</th>
                    <th>Nama Barang</th>
                    <th>Nama Kasir</th>
                    <th>Jumlah Beli</th>
                    <th>Total Harga</th>
                    <th>Tanggal Beli</th>
                    <th>Action</th>
                </tr>
               </thead>
               <tbody>
                @foreach ($data as $item)
                <tr> 
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kd_transaksi }}</td>
                    <td>{{ $item->barang->nama_barang }}</td>
                    <td>{{ $item->user_id }}</td>
                    <td>{{ $item->jumlah_beli }}</td>
                    <td>{{ $item->total_harga }}</td>
                    <td>{{ $item->tanggal_beli }}</td>
                    <td>
                        <a href="{{url('delete_transaksi', $item->id)}}" onclick="return confirm('Yakin hapus data?')" class="badge badge-danger">Delete</a>
                @endforeach
                    </td>
                </tr>
             
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