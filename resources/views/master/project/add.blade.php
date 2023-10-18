@extends('parent')
@section('title', 'Add Project')
@section('content')
<div class="card">
    <div class="card-header">Add Project - {{$data->name}}</div>
    <div class="card-body">
        <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach ($errors->all() as $error)
                <div id="error-message" class="alert alert-danger">
                    <li class="text-danger">{{$error}}</li>
                </div>
            @endforeach
            <input type="hidden" value="{{$data->id}}" name="siswa_id">
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="img_project">
                @error('img_project')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="nama">Nama Project</label>
                    <input type="text" name="nm_project" class="form-control" required>
                    @error('nm_project')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-6">
                    <label for="jurusan">Tanggal Project</label>
                    <input type="date" name="date_project" class="form-control" required>
                    @error('date_project')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <a class="btn btn-danger" href="{{ route('project.index') }}">Back</a>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</div>
@endsection
