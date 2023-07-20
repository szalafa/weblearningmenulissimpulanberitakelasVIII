<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AsesmenStoreRequest;
use App\Http\Requests\AsesmenUpdateRequest;
use App\Models\Asesmen;
use App\Models\JawabanAsesmen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\File as FacadesFile;

class AsesmenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.asesmen.index', ['asesmen' => Asesmen::count()]);
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
    public function store(AsesmenStoreRequest $request)
    {
        try {
            $data = Asesmen::create([
                'order' => $request->order,
                'soal_asesmen' => $request->soal_asesmen,
            ]);

            // Cek apakah ada file video
            if ($request->file('video_asesmen')) {
                $fileName = 'VA-' . time() . '.' . $request->video_asesmen->getClientOriginalExtension();
                $path = $request->file('video_asesmen')->move(base_path('../public_html/hanantakusuma/assets/video_asesmen'), $fileName);

                $data->update([
                    'video_asesmen' => $fileName,
                ]);
            }

            return redirect()
                ->route('asesmens.index')
                ->with(['success' => 'Data ' . $data->order . ' berhasil ditambahkan']);
        } catch (\Exception $e) {
            return redirect()
                ->route('asesmens.index')
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
        $data = Asesmen::find(Crypt::decrypt($id));

        return view('admin.asesmen.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AsesmenUpdateRequest $request, string $id)
    {
        $data = Asesmen::find($id);

        try {
            $data->update([
                'order' => $request->order,
                'soal_asesmen' => $request->soal_asesmen,
            ]);

            // Cek apakah ada file video
            if ($request->file('video_asesmen')) {
                $fileName = 'VA-' . time() . '.' . $request->video_asesmen->getClientOriginalExtension();
                $path = $request->file('video_asesmen')->move(base_path('../public_html/hanantakusuma/assets/video_asesmen'), $fileName);

                // Hapus file video lama
                if ($data->video_asesmen) {
                    $oldVideo = $data->video_asesmen;
                    FacadesFile::delete(base_path('../public_html/hanantakusuma/assets/video_asesmen/' . $oldVideo));
                }

                $data->update([
                    'video_asesmen' => $fileName,
                ]);
            }

            return redirect()
                ->route('asesmens.index')
                ->with(['success' => 'Data ' . $data->order . ' berhasil diupdate']);
        } catch (\Exception $e) {
            return redirect()
                ->route('asesmens.index')
                ->with(['error' => 'Data ' . $data->order . ' gagal diupdate']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $asesmen = Asesmen::find(Crypt::decrypt($id));

        try {
            $asesmen->delete();
            FacadesFile::delete(base_path('../public_html/hanantakusuma/assets/video_asesmen/' . $asesmen->video_asesmen));

            return redirect()
                ->route('asesmens.index')
                ->with(['success' => 'Data ' . $asesmen->order . ' berhasil dihapus']);
        } catch (\Exception $e) {
            return redirect()
                ->route('asesmens.index')
                ->with(['error' => 'Data ' . $asesmen->order . ' gagal dihapus']);
        }
    }

    public function IndexTable()
    {
        return DataTables::of(Asesmen::query())
            ->addIndexColumn()
            ->addColumn('aksi', 'admin.asesmen.dt.aksi')
            ->addColumn('soal', 'admin.asesmen.dt.soal_asesmen')
            ->addColumn('created_date', 'admin.asesmen.dt.created_date')
            ->rawColumns(['aksi', 'soal', 'created_date'])
            ->toJson();
    }

    public function getOrder()
    {
        $data = Asesmen::count();

        return response()->json($data + 1);
    }
}
