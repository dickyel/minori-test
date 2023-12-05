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

    <form action="{{ route('training-admin.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="jenis">Jenis:</label>
                    <input type="text" class="form-control" id="jenis" name="jenis" required>
                    
                </div>
            </div>
          
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="jabatan">Keterangan :</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
                    
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-secondary" id="addForm">Simpan</button>
    </form>

</div>

@endsection
