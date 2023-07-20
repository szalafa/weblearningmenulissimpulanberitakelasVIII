<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiskusiStoreRequest;
use App\Models\Diskusi;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiskusiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materi = Materi::where('diskusi', 1)->get();

        if ($materi->isEmpty()) {
            return view('murid.diskusi_null');
        }

        return view('murid.diskusi', compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiskusiStoreRequest $request)
    {
        try {
            $data = Diskusi::create([
                'materi_id' => $request->materi_id,
                'user_id' => $request->user_id,
                'pesan' => $request->pesan,
            ]);

            return response()->json('Success');
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Diskusi::with('user')
            ->where('materi_id', $id)
            ->orderBy('created_at', 'ASC')
            ->get();

        try {
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
