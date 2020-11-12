@extends('layouts.master')
@section('title', 'Edit Distributor')
@section('pagetitle')
    <h1>Edit Distributor</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-body">
                 <form action="{{ route('update_distributor', $distributor->id) }}" method="POST">
                   @csrf
                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('kd_distributor') class="text-danger" 
                        @enderror>Kode Distributor @error('kd_distributor')
                             {{ $message }}
                          @enderror
                        </label>
                        <input type="text" name="kd_distributor" value="{{ $distributor->kd_distributor }}" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('merek') class="text-danger" 
                        @enderror>Nama Distributor @error('nama_distributor')
                             {{ $message }}
                          @enderror
                        </label>
                        <input type="text" name="nama_distributor" value="{{ $distributor->nama_distributor }}" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <label @error('alamat') class="text-danger" 
                          @enderror>Alamat @error('alamat')
                               {{ $message }}
                            @enderror
                          </label>
                          <textarea id="alamat" type="text" name="alamat" class="form-control">{{ $distributor->alamat }}</textarea>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label @error('no_telp') class="text-danger" 
                          @enderror>Nomor Telepon @error('no_telp')
                               {{ $message }}
                            @enderror
                          </label>
                          <input type="number" name="no_telp" value="{{ $distributor->no_telp }}" class="form-control">
                        </div>
                      </div>

                  </div>
                  <div class="card-footer text-right">
                      <button class="btn btn-primary mr-1" type="submit">Submit</button>
                      <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                 </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('page-scripts')
    
@endpush