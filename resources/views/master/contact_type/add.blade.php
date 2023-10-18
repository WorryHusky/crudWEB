@extends('parent')
@section('title', 'Add Tipe Kontak')
@section('content')
<div class="card">
    <div class="card-header">Add Tipe Kontak</div>
    <div class="card-body">
        <form action="{{ route('contact_type.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group">
                    <label for="type_name">Tipe Kontak</label>
                    <input type="text" name="type_name" class="form-control" required>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <a class="btn btn-danger" href="{{ route('contact_type.index') }}">Back</a>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</div>


@endsection
