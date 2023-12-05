
@extends('layouts.admin')

@section('title', 'Training-admin-')

@section('content')
<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Form Tambah Training</h2>
    @if($errors->any())
        <div class="alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('store-pegawai-training') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="jenis">Pilih Training:</label>
                    <select name="id" id="id" class="form-control">
                        @foreach($trainings as $training)
                            <option value="{{ $training->id }}">{{ $training->jenis }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="jenis">Pilih User:</label>
                    <select name="pegawai_id" id="pegawai_id" class="form-control">
                        @foreach($pegawais as $pegawai)
                            <option value="{{ $pegawai->id }}">{{ $pegawai->nama_karyawan }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="tgl_sertifikat">Tgl Sertifikat:</label>
                    <input type="date" class="form-control" id="tgl_sertifikat" name="tgl_sertifikat" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-secondary" id="addForm">Simpan</button>
    </form>
</div>
@endsection
