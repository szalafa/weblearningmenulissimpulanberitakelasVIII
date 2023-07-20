<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    
    protected $guarded = [];
}


class MateriController 
{
    public function getData($video_pembelajaran)
    {
        $materi = Materi::where('video_pembelajaran', $video_pembelajaran)->first();

        if ($materi) {
            // Lakukan sesuatu jika data ditemukan
        } else {
            // Lakukan sesuatu jika data tidak ditemukan
        }
    }

    public function delete($video_pembelajaran)
    {
        $materi = Materi::where('video_pembelajaran', $video_pembelajaran)->first();

        if ($materi) {
            $materi->delete();

            return response()->json([
                'message' => 'Data berhasil dihapus'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }
}
