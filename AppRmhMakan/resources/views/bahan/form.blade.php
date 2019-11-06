@extends('main')

@section('title','Form Bahan')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6"><h1>Bahan</h1></div>
                <div class="col-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route("bahan.index") }}">List Bahan</a></li>
                        <li class="breadcrumb-item active">Form Bahan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">Form Bahan</h3>
            </div>
            <div class="card-body">
                <form action={{isset($data)?route('bahan.update',[$data->id]):route('bahan.store')}} method="POST" autocomplete="off">
                    @csrf
                    @if (isset($data))
                        @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ (isset($data)?$data->nama:old('nama')) }}" maxlength="50">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ (isset($data)?$data->harga:old('harga')) }}" maxlength="6">
                        @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="qty">Kuantitas</label>
                        <input type="text" class="form-control @error('qty') is-invalid @enderror" name="qty" value="{{ (isset($data)?$data->qty:old('qty')) }}" maxlength="4">
                        @error('qty')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="text" class="form-control @error('satuan') is-invalid @enderror" name="satuan" value="{{ (isset($data)?$data->satuan:old('satuan')) }}" maxlength="20">
                        @error('satuan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group float-right">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>Simpan</button>
                        <a href="{{ route("bahan.index") }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection