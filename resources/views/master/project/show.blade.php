@if ($datas->isEmpty())
    <h4 class="text-center">Siswa Tidak Memiliki Project</h4>
@else
    <div class="row">
        @foreach ($datas as $data)
        <div class="col-md-4">
            <div class="card mb-3">
                <img src="{{$data->img_project}}" alt="Gambar Project" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{ $data->nm_project }}</h5>
                    <p class="card-text">Tanggal Project: {{ $data->date_project }}</p>
                </div>
                <div class="card-footer text-end d-flex gap-2" >
                    <a href="{{ route('project.edit', $data->id) }}" class="btn btn-sm btn-success">Edit</a>
                    <form action="{{ route('project.destroy', $data->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</a>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif
