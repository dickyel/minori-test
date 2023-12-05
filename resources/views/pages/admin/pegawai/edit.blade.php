@extends('layouts.admin')


@section('title','pegawai-admin-create')

@section('content')


<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Pegawai Update Pegawai</h2>
    @if($errors->any())
                    
        <div class="alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>    
        </div>
    
    @endif
    <form action="{{ route('pegawai-admin.update', $item->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="nip">NIP :</label>
                        <input type="text" class="form-control" id="name" name="nip" value="{{ $item->nip }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="nama_karyawan">Nama Karyawan:</label>
                        <input type="nama_karyawan" class="form-control" id="nama_karyawan" name="nama_karyawan" value="{{ $item->nama_karyawan }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="jabatan">Jabatan: </label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $item->jabatan }}">
                    </div>
                </div>

            
            
            </div>
        <button type="submit" class="btn btn-primary">Tambah Simpan</button> 
        
    </form>

</div>

@endsection
