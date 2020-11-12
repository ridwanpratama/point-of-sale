@extends('layouts.master')
@section('title', 'Edit Merek')
@section('pagetitle')
    <h1>Edit Merek</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <div class="card">
               <div class="card-body">
                 <form action="{{ route('update_merek', $merek->id) }}" method="POST">
                   @csrf
                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('kd_merek') class="text-danger" 
                        @enderror>Kode Merek @error('kd_merek')
                             {{ $message }}
                          @enderror
                        </label>
                        <input type="text" name="kd_merek" value="{{ $merek->kd_merek }}" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label @error('merek') class="text-danger" 
                        @enderror>Merek @error('merek')
                             {{ $message }}
                          @enderror
                        </label>
                        <input type="text" name="merek" value="{{ $merek->merek }}" class="form-control">
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