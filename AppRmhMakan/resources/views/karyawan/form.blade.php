@extends('main')

@section('title','Form Karyawan')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6"><h1>Karyawan</h1></div>
                <div class="col-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route("home") }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route("karyawan.index") }}">List Karyawan</a></li>
                        <li class="breadcrumb-item active">Form Karyawan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">Form Karyawan</h3>
            </div>
            <div class="card-body">
                <form action={{isset($data)?route('karyawan.update',[$data->id]):route('karyawan.store')}} method="POST" autocomplete="off">
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
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ (isset($data)?$data->alamat:old('alamat')) }}" maxlength="50">
                        @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" class="form-control @error('telepon') is-invalid @enderror" name="telepon" value="{{ (isset($data)?$data->telepon:old('telepon')) }}" maxlength="25">
                        @error('telepon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <select name="jenis" id="jenis"
                            class="form-control">
                            <option value="w" {{ isset($data) && $data->jenis=="Waiter"?"selected":'' }}>
                            Waiter</option>
                            <option value="k" {{ isset($data) && $data->jenis=="Koki"?"selected":'' }}>
                            Koki</option>
                            <option value="c" {{ isset($data) && $data->jenis=="Kasir"?"selected":'' }}>
                            Kasir</option>
                        </select>
                    </div>
                    <div class="form-group float-right">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>Simpan</button>
                        <a href="{{ route("karyawan.index") }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i>Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection