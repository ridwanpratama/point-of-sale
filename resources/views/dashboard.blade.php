@extends('layouts.master')
@section('title', 'POS Dashboard')
@section('pagetitle')
    <h1>Dashboard</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Jumlah User</h4>
              </div>
              <div class="card-body">
                  {{ $jumlah_user }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Jumlah Barang</h4>
              </div>
              <div class="card-body">
                {{ $jumlah_barang }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Jumlah Transaksi</h4>
              </div>
              <div class="card-body">
                {{ $jumlah_transaksi }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-success">
              <i class="fas fa-circle"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Jumlah Distributor</h4>
              </div>
              <div class="card-body">
                {{ $jumlah_distributor }}
              </div>
            </div>
          </div>
        </div>
      </div>

        
</div>
@endsection

@push('page-scripts')
    
@endpush
