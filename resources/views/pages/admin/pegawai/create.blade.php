@extends('layouts.admin')

@section('title', 'Pegawai-admin-')

@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Form Tambah Pegawai</h2>
    @if($errors->any())
        <div class="alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pegawai-admin.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="nip">NIP:</label>
                    <input class="form-control" id="nip" name="nip" required>
                    
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="nama_karyawan">Nama Karyawan:</label>
                    <input class="form-control" id="nama_karyawan" name="nama_karyawan" required>
                    
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="jabatan">Jabata :</label>
                    <input class="form-control" id="jabatan" name="jabatan" required>
                    
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-secondary" id="addForm">Tambah Form</button>
    </form>

</div>

@endsection
