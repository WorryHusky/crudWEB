<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Siswa;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all('id','name');
        return view('master.project.index', compact('siswas'));
    }

    public function show(string $id)
    {
        $datas = Siswa::find($id)->projects()->get();
        return view('master.project.show', compact('datas'));
    }

    public function create($id)
    {
        $data = Siswa::find($id);
        return view('master.project.add', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nm_project' => 'required|min:5',
            'date_project' => 'required',
            'img_project' => 'required|mimes:png,jpg,jpeg',
            'siswa_id' => 'required',
        ]);

        if ($request->hasFile('img_project')) {
            $imagePath = $request->file('img_project')->move('project_images/', $request->file('img_project')->getClientOriginalName());
            $data['img_project'] = $imagePath;
        }
    
        if (Project::create($data)) {
            return redirect()->route('project.index')->with('success', 'Project added successfully.');
        } else {
            return redirect()->route('project.index')->with('error', 'Failed to add Project.');
        }
    }

    public function edit($id)
    {
        $project = Project::with('siswa')->find($id);
        return view('master.project.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::find($id);
    
        $data = $request->validate([
            'nm_project' => 'required|max:2',
            'date_project' => 'required',
            'img_project' => 'mimes:png,jpg,jpeg',
            'siswa_id' => 'required',
        ]);
    
        if ($request->hasFile('img_project')) {
            $newImagePath = $request->file('img_project')->move('project_images/', $request->file('img_project')->getClientOriginalName());
            $data['img_project'] = $newImagePath;
    
            if ($project->img_project) {
                $previousImagePath = public_path($project->img_project);
                if (File::exists($previousImagePath)) {
                    File::delete($previousImagePath);
                }
            }
        }
    
        if ($project->update($data)) {
            return redirect()->route('project.index')->with('success', 'Project updated successfully.');
        } else {
            return redirect()->route('project.index')->with('error', 'Failed to update Project.');
        }
    }

    public function destroy($id)
    {
        $project = Project::find($id);

        if (!$project) {
            return redirect()->route('project.index')->with('error', 'Project not found.');
        }

        if (file_exists(public_path($project->img_project))) {
            unlink(public_path($project->img_project));
        }

        $project->delete();

        return redirect()->route('project.index')->with('success', 'Project deleted successfully.');
    }
}
