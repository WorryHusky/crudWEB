<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $fillable = ['type_id', 'siswa_id', 'name'];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function type()
    {
        return $this->belongsTo(ContactType::class);
    }
}
