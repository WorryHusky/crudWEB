@extends('parent')
@section('title', 'Edit Tipe Kontak')
@section('content')
<div class="card">
    <div class="card-header">Edit Tipe Kontak</div>
    <div class="card-body">
        <form action="{{ route('contact_type.update', $contact_type->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Tipe kontak</label>
                <input type="text" name="type_name" class="form-control" value="{{ $contact_type->type_name }}" required>
            </div>           
            <div class="d-flex justify-content-between">
                <a class="btn btn-danger" href="{{ route('contact_type.index') }}">Back</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
