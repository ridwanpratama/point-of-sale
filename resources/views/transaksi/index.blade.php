@extends('layouts.master')
@section('title', 'POS - Transaksi')
@section('pagetitle')
    <h1>Transaksi</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-body">
                 <form action="{{ route('simpan_transaksi') }}" method="POST">
                   @csrf
                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('kd_transaksi') class="text-danger" 
                        @enderror>Kode Transaksi @error('kd_transaksi')
                             {{ $message }}
                          @enderror
                        </label>
                        <input type="text" name="kd_transaksi" value="" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('barang_id') class="text-danger" 
                        @enderror>Nama Barang @error('barang_id')
                             {{ $message }}
                          @enderror
                        </label>
                        <select class="form-control" name="barang_id" id="barang_id">
                          <option value disable>Pilih Barang</option>
                          @foreach ($data as $item)
                          <option value="{{ $item->id }}" data-stok={{ $item->stok_barang }} data-harga="{{$item->harga_barang}}">{{ $item->nama_barang }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('user_id') class="text-danger" 
                        @enderror>Nama Kasir @error('user_id')
                             {{ $message }}
                          @enderror
                        </label>
                        <input type="text" name="user_id" id="user_id" value="{{auth()->user()->name}}" class="form-control" readonly>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('jumlah_beli') class="text-danger" 
                        @enderror>Jumlah Beli @error('jumlah_beli')
                             {{ $message }}
                          @enderror
                        </label>
                        <input type="number" name="jumlah_beli" id="jumlah_beli" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('total_harga') class="text-danger" 
                        @enderror>Total Harga @error('total_harga')
                             {{ $message }}
                          @enderror
                        </label>
                        <input type="number" id="total_harga" name="total_harga" value="" class="form-control" readonly>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('tanggal_beli') class="text-danger" 
                        @enderror>Tanggal Beli @error('tanggal_beli')
                             {{ $message }}
                          @enderror
                        </label>
                        <input type="date" name="tanggal_beli" value="" class="form-control">
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
<script>
$(document).ready(function(){

    $('select').change(function(){
      let harga = $(this).find(':selected').data('harga');
      let stok = $(this).find(':selected').data('stok');

      jQuery('#jumlah_beli').keyup(function(){
          let jumlah_beli = $('#jumlah_beli').val()
          if(jumlah_beli > stok){
            $('#jumlah_beli').val();
            alert('Stok Tidak Mencukupi');
          }else{
            let total = parseInt(harga) * parseInt(jumlah_beli)

            if (harga == "kosong") {
                total = ""
            }

            if (jumlah_beli == "") {
                total = ""
            }

            console.log(total);
            if(!isNaN(total)){
                $('#total_harga').val(total)
            }
          }
      })
  })
});
</script>
@endpush