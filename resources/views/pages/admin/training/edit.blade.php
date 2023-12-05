@extends('layouts.admin')


@section('title','pegawai-admin-create')

@section('content')


<div id="content" class="p-4 p-md-5 pt-5">
    <h2 class="mb-4">Training Update Pegawai</h2>
    @if($errors->any())
                    
        <div class="alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>    
        </div>
    
    @endif
    <form action="{{ route('training-admin.update', $item->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="jening">Jenis :</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" value="{{ $item->jenis }}">
                    </div>
                </div>

      

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="jabatan">Keterangan: </label>
                        <textarea class="form-control" id="keterangan" name="keterangan">{{ $item->keterangan }}</textarea>
                    </div>
                </div>

            
            
            </div>
        <button type="submit" class="btn btn-primary">Tambah Simpan</button> 
        
    </form>

</div>

@endsection
