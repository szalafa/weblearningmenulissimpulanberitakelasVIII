<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesmen extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jawaban_asesmens()
    {
    	return $this->hasMany(JawabanAsesmen::class);
    }
}
