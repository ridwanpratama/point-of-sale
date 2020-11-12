@extends('layouts.master')
@section('title', 'Edit Barang')
@section('pagetitle')
    <h1>Edit Barang</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-body">
                 <form action="{{ route('update_barang',$barang->id) }}" method="POST">
                   @csrf
                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('kd_barang') class="text-danger" 
                        @enderror>Kode Barang @error('kd_barang')
                             {{ $message }}
                          @enderror
                        </label>
                        <input type="text" name="kd_barang" value="{{ $barang->kd_barang }}" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('nama_barang') class="text-danger" 
                        @enderror>Nama Barang @error('nama_barang')
                             {{ $message }}
                          @enderror
                        </label>
                        <input type="text" name="nama_barang" value="{{ $barang->nama_barang }}" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <label @error('tanggal_masuk') class="text-danger" 
                          @enderror>Tanggal Masuk @error('tanggal_masuk')
                               {{ $message }}
                            @enderror
                          </label>
                          <input type="date" name="tanggal_masuk" value="{{ $barang->tanggal_masuk }}" class="form-control">
                        </div>
                      </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('harga_barang') class="text-danger" 
                        @enderror>Harga Barang @error('harga_barang')
                             {{ $message }}
                          @enderror
                        </label>
                        <input type="number" name="harga_barang" value="{{ $barang->harga_barang }}" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <label @error('stok_barang') class="text-danger" 
                          @enderror>Stok Barang @error('stok_barang')
                               {{ $message }}
                            @enderror
                          </label>
                          <input type="number" name="stok_barang" value="{{ $barang->stok_barang }}" class="form-control">
                        </div>
                      </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('merek_id') class="text-danger" 
                        @enderror>Merek @error('merek_id')
                             {{ $message }}
                          @enderror
                        </label>
                        <select class="form-control" name="merek_id" id="merek_id">
                          <option value="{{ $barang->merek_id }}"> {{ $barang->merek->merek }} </option>
                          @foreach ($merek as $item)
                          <option value="{{ $item->id }}">{{ $item->merek }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('distributor_id') class="text-danger" 
                        @enderror>Distributor @error('distributor_id')
                             {{ $message }}
                          @enderror
                        </label>
                        <select class="form-control" name="distributor_id" id="distributor_id">
                          <option value="{{ $barang->distributor_id }}"> {{ $barang->distributor->nama_distributor }} </option>
                          @foreach ($distributor as $item)
                          <option value="{{ $item->id }}">{{ $item->nama_distributor }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('keterangan') class="text-danger" 
                        @enderror>Keterangan @error('keterangan')
                             {{ $message }}
                          @enderror
                        </label>
                        <input type="text" name="keterangan" value="{{ $barang->keterangan }}" class="form-control">
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