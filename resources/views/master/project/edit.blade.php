@extends('parent')

@section('title', 'Edit Project')

@section('content')
<div class="card">
    <div class="card-header">Edit Project - {{ $project->siswa->name }}</div>
    <div class="card-body">
        <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @foreach ($errors->all() as $error)
                <div id="error-message" class="alert alert-danger">
                    <li class="text-danger">{{$error}}</li>
                </div>
            @endforeach
            <input type="hidden" value="{{ $project->siswa->id }}" name="siswa_id">
            
            <div class="form-group row">
                <label for="current_image" class="col-sm-2 col-form-label">Gambar Saat Ini</label>
                <div class="col-sm-10">
                    <img src="{{ asset($project->img_project) }}" alt="not found" class="img-thumbnail" style="max-width: 200px;">
                </div>
            </div>

            <div class="form-group row">
                <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="gambar" name="img_project">
                </div>
            </div>

            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Project</label>
                <div class="col-sm-10">
                    <input type="text" name="nm_project" class="form-control" required value="{{ $project->nm_project }}">
                    @error('nm_project')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Project</label>
                <div class="col-sm-10">
                    <input type="date" name="date_project" class="form-control" required value="{{ $project->date_project }}">
                    @error('date_project')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <a class="btn btn-danger" href="{{ route('project.index') }}">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
