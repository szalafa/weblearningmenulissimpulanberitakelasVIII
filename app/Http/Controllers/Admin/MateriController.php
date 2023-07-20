<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MateriStoreRequest;
use App\Http\Requests\MateriUpdateRequest;
use Illuminate\Support\Facades\File as FacadesFile;
use App\Models\Materi;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\DataTables;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.materi.index');
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
    public function store(MateriStoreRequest $request)
    {
        try {
            $data = Materi::create([
                'order' => $request->order,
                'header' => $request->header,
                'materi' => $request->materi,
                'diskusi' => $request->diskusi,
            ]);

            // Cek apakah ada file video
            if ($request->file('video_pembelajaran')) {
                $fileName = 'VP-' . time() . '.' . $request->video_pembelajaran->getClientOriginalExtension();
                $path = $request->file('video_pembelajaran')->move(public_path('assets/video_pembelajaran'), $fileName);

                $data->update([
                    'video_pembelajaran' => $fileName,
                ]);
            }

            return redirect()
                ->route('materi.index')
                ->with(['success' => 'Data ' . $data->order . ' berhasil ditambahkan']);
        } catch (\Exception $e) {
            return redirect()
                ->route('materi.index')
                ->with(['error' => 'Data ' . $data->order . ' gagal ditambahkan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Materi::find(Crypt::decrypt($id));

        return view('admin.materi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MateriUpdateRequest $request, string $id)
    {
        $data = Materi::find($id);

        try {
            $data->update([
                'order' => $request->order,
                'header' => $request->header,
                'materi' => $request->materi,
                'diskusi' => $request->diskusi,
            ]);

            // Cek apakah ada file video
            if ($request->file('video_pembelajaran')) {
                $fileName = 'VP-' . time() . '.' . $request->video_pembelajaran->getClientOriginalExtension();
                $path = $request->file('video_pembelajaran')->move(public_path('assets/video_pembelajaran'), $fileName);

                // Hapus file video lama
                if ($data->video_pembelajaran) {
                    $oldVideo = $data->video_pembelajaran;
                    FacadesFile::delete(public_path('assets/video_pembelajaran/' . $oldVideo));
                }

                $data->update([
                    'video_pembelajaran' => $fileName,
                ]);
            }

            return redirect()
                ->route('materi.index')
                ->with(['success' => 'Data ' . $data->order . ' berhasil diupdate']);
        } catch (\Exception $e) {
            return redirect()
                ->route('materi.index')
                ->with(['error' => 'Data ' . $data->order . ' gagal diupdate']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Materi::find(Crypt::decrypt($id));

        try {
            $data->delete();

            return redirect()
                ->route('materi.index')
                ->with(['success' => 'Data ' . $data->order . ' berhasil dihapus']);
        } catch (\Exception $e) {
            return redirect()
                ->route('materi.index')
                ->with(['error' => 'Data ' . $data->order . ' gagal dihapus']);
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


    public function IndexTable()
    {
        return DataTables::of(Materi::query())
            ->addIndexColumn()
            ->addColumn('aksi', 'admin.materi.dt.aksi')
            ->addColumn('materi', 'admin.materi.dt.materi')
            ->addColumn('diskusi', 'admin.materi.dt.diskusi')
            ->rawColumns(['aksi', 'materi', 'diskusi'])
            ->toJson();
    }

    public function getOrder()
    {
        $data = Materi::count();

        return response()->json($data + 1);
    }
}
