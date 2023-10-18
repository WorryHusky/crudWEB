<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $pagination = 3;

        $per = (($request->per) ? $request->per : 10);
        $page = (($request->page) ? $request->page - 1 : 0);

        DB::statement('set @angka=0+' . $per * $page);
        $siswaList = Siswa::where(function ($q) use ($request) {
            $q->where('name', 'LIKE', '%' . $request->search . '%');
        })->orderBy('id', 'asc')->paginate($pagination);
        return view('master.siswa.index', compact('siswaList'));
    }

    public function create()
    {
        return view('master.siswa.add');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required',
        'jurusan' => 'required',
        'kelas' => 'required',
        'img_siswa' => 'mimes:png,jpg,jpeg',
    ]);

    if ($request->hasFile('img_siswa')) {
        $imagePath = $request->file('img_siswa')->move('siswa_images/', $request->file('img_siswa')->getClientOriginalName());
        $data['img_siswa'] = $imagePath;
    }

    if (Siswa::create($data)) {
        return redirect()->route('siswa.index')->with('success', 'Siswa added successfully.');
    } else {
        return redirect()->route('siswa.index')->with('error', 'Failed to add siswa.');
    }
}


    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('master.siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
    
        $data = $request->validate([
            'name' => 'required|max:6',
            'jurusan' => 'required',
            'kelas' => 'required|min:5',
            'img_siswa' => 'mimes:png,jpg,jpeg',
        ]);
    
        if ($request->hasFile('img_siswa')) {
            $newImagePath = $request->file('img_siswa')->move('siswa_images/', $request->file('img_siswa')->getClientOriginalName());
            $data['img_siswa'] = $newImagePath;
    
            if ($siswa->img_siswa) {
                $previousImagePath = public_path($siswa->img_siswa);
                if (File::exists($previousImagePath)) {
                    File::delete($previousImagePath);
                }
            }
        }
    
        if ($siswa->update($data)) {
            return redirect()->route('siswa.index')->with('success', 'Siswa updated successfully.');
        } else {
            return redirect()->route('siswa.index')->with('error', 'Failed to update siswa.');
        }
    }

    

    public function destroy($id)
    {
        $siswa = Siswa::find($id);

        if (!$siswa) {
            return redirect()->route('siswa.index')->with('error', 'Siswa not found.');
        }

        if (file_exists(public_path($siswa->img_siswa))) {
            unlink(public_path($siswa->img_siswa));
        }

        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Siswa deleted successfully.');
    }

    

}
