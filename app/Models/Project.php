<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = ['nm_project', 'date_project', 'img_project', 'siswa_id'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
