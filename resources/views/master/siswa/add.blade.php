@extends('parent')
@section('title', 'Add Siswa')
@section('content')
<div class="card">
    <div class="card-header">Add Siswa</div>
    <div class="card-body">
        <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @foreach ($errors->all() as $error)
                <div id="error-message" class="alert alert-danger">
                    <li class="text-danger">{{$error}}</li>
                </div>
            @endforeach
            <div class="form-group">
                <label for="gambar">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="img_siswa">
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="nama">Nama</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group col-6">
                    <label for="jurusan">Jurusan</label>
                    {{-- <input type="text" name="jurusan" class="form-control" required> --}}
                    <select class="form-select" id="inputGroupSelect01" required name="jurusan">
                        <option selected>Choose...</option>
                        <option value="AKL">Akuntansi dan Keuangan Lembaga</option>
                        <option value="BDP">Bisnis Daring dan Pemasaran</option>
                        <option value="OTKP">Otomatisasi dan Tata Kelola Perkantoran</option>
                        <option value="RPL">Rekayasa Perangkat Lunak</option>
                        <option value="MM">Multimedia</option>
                        <option value="TKJ">Teknik Komputer dan Jaringan</option>
                        <option value="DKV">Desain Komunikasi Visual</option>
                        <option value="PSPT">Produksi Siaran Program Pertelevisian</option>
                        <option value="PH">Perhotelan</option>
                      </select>
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" name="kelas" class="form-control" required>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <a class="btn btn-danger" href="{{ route('siswa.index') }}">Back</a>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
        @if (session('success'))
<script>
    Swal.fire(
        '{{ session("success.title") }}',
        '{{ session("success.text") }}',
        'success'
    )
</script>
@endif

    </div>
</div>


@endsection
