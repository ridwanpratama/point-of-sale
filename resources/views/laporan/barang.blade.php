@extends('layouts.master')
@section('title', 'POS - Laporan')
@section('pagetitle')
    <h1>Laporan Barang</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
                <form action="/laporan/search" method="GET">
                @csrf
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <input type="date" class="form-control @error('startDate') is-invalid @enderror mb-3" name="startDate" id="startDate">
                        @error('starDate')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                    </div>
                    <div class="col-auto">
                        <label class="col-sm-2 mb-3"><b>-</b></label>
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control @error('endDate') is-invalid @enderror mb-3" name="endDate" id="endDate">
                        @error('endDate')
                        <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Cari</button>
                    </div>
            </div>
        </div>
        <hr>
    </div>
</form>
<div class="card">
    <div class="card-body">
    <table id="table" class="table table-striped table-bordered table-md">
    <thead>
        <tr>
            <th>No</th>        
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Tanggal Masuk</th>
            <th>Harga Barang</th>
            <th>Stok Barang</th>
            <th>Nama Merek</th>
            <th>Nama Distributor</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($barang as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->kd_barang }}</td>
            <td>{{ $item->nama_barang }}</td>
            <td>{{ $item->tanggal_masuk }}</td>
            <td>{{ $item->harga_barang }}</td>
            <td>{{ $item->stok_barang }}</td>
            <td>{{ $item->merek->merek }}</td>
            <td>{{ $item->distributor->nama_distributor }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection

@push('after-script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>
@endpush
