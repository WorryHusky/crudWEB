@extends('parent')
@section('title', 'Edit Siswa')
@section('content')
<div class="card">
    <div class="card-header">Edit Siswa</div>
    <div class="card-body">
        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @foreach ($errors->all() as $error)
                <div id="error-message" class="alert alert-danger">
                    <li class="text-danger">{{$error}}</li>
                </div>
            @endforeach
                <div class="form-group">
                    <label for="current_image">Gambar Saat Ini</label><br>
                    <img src="{{ asset($siswa->img_siswa) }}" alt="not found" width="200">
                </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="img_siswa">
                </div>
                <div class="form-group col-6">
                    <label for="nama">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ $siswa->name }}" required>
                </div>
                <div class="form-group col-6">
                    <label for="jurusan">Jurusan</label>
                    {{-- <input type="text" name="jurusan" class="form-control" value="{{ $siswa->jurusan }}" required> --}}
                    <select class="form-select" id="inputGroupSelect01" required name="jurusan">
                        <option selected>Choose...</option>
                        <option value="AKL" {{ $siswa->jurusan === 'AKL' ? 'selected' : '' }}>Akuntansi dan Keuangan Lembaga</option>
                        <option value="BDP"  {{ $siswa->jurusan === 'BDP' ? 'selected' : '' }}>Bisnis Daring dan Pemasaran</option>
                        <option value="OTKP"  {{ $siswa->jurusan === 'OTKP' ? 'selected' : '' }}>Otomatisasi dan Tata Kelola Perkantoran</option>
                        <option value="RPL"  {{ $siswa->jurusan === 'RPL' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
                        <option value="MM"  {{ $siswa->jurusan === 'MM' ? 'selected' : '' }}>Multimedia</option>
                        <option value="TKJ"  {{ $siswa->jurusan === 'TKJ' ? 'selected' : '' }}>Teknik Komputer dan Jaringan</option>
                        <option value="DKV"  {{ $siswa->jurusan === 'DKV' ? 'selected' : '' }}>Desain Komunikasi Visual</option>
                        <option value="PSPT"  {{ $siswa->jurusan === 'PSPT' ? 'selected' : '' }}>Produksi Siaran Program Pertelevisian</option>
                        <option value="PH"  {{ $siswa->jurusan === 'PH' ? 'selected' : '' }}>Perhotelan</option>
                      </select>
                </div>
                <div class="form-group col-6">
                    <label for="kelas">Kelas</label>
                    <input type="text" name="kelas" class="form-control" value="{{ $siswa->kelas }}" required>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <a class="btn btn-danger" href="{{ route('siswa.index') }}">Back</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>


@endsection
