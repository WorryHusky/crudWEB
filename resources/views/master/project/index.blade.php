@extends('parent')
@section('title', 'Project')
@section('content')

    {{-- <div class="card">
        <div class="card-header">
            <p class="fs-1 text-dark">Project</p>
        </div>
        <div class="card-body">
            <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                <div class="datatable-container">
                    <div class="datatable-top mb-3">
                        <a class="btn btn-primary" href="{{ route('project.create') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg mr-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                            </svg>Add Project
                        </a>
                    </div>
                    <hr>
                    @if(count($projectList) > 0)
                    <table id="datatablesSimple" class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image Project</th>
                                <th scope="col">Nama Project</th>
                                <th scope="col">Tanggal Project</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projectList as $project)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset($project->img_project) }}" alt="not found" width="100">
                                </td>
                                <td>{{ $project->nm_project }}</td>
                                <td>{{ $project->date_project }}</td>
                                <td>{{ $project->siswa->name }}</td>
                                <td class="d-flex">
                                    <a class="btn btn-warning mr-1" href="{{ route('project.edit', $project->id) }}">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('project.destroy', $project->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-trash3"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>No data available.</p>
                    @endif
                </div>
            </div>
        </div>
    </div> --}}
    @csrf
    @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

<div class="row gap-1 d-flex">
    <div class="col-5">
        <div class="card">
            <div class="card-header">
                <p class="fs-1 text-dark">Siswa</p>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Siswa</th>
                        <th scope="col">action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($siswas as $item)
                      <tr>
                        <th scope="row">1</th>
                        <td>{{$item->name}}</td>
                        <td>
                            <a class="btn btn-info" onclick="show({{ ($item->id) }})"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-fill" viewBox="0 0 16 16">
                                <path d="M9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.825a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3zm-8.322.12C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139z"/>
                              </svg></a>
                            <a href="{{ route('project.create', $item->id) }}" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                              </svg></a>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <p class="fs-1 text-dark">Project</p>
            </div>
            <div id="project" class="card-body">
                <h4 class="text-center">
                    Silahkan Pilih Siswa Terlebih Dahulu
                </h4>
            </div>
        </div>
    </div>
</div>


<script>
    function show(id){
        $.get('project/' + id, (data) => {
            $("#project").html(data);
        })
    }
</script>
@endsection
