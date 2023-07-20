<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JawabanAsesmen;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HasilAsesmenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asesmen = JawabanAsesmen::get();

        return view('admin.asesmen.hasil_asesmen', compact('asesmen'));
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
    public function store(Request $request)
    {
        //
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

    public function hasilAsesmenDT()
    {
        return DataTables::of(JawabanAsesmen::query())
            ->addIndexColumn()
            ->addColumn('username', 'admin.asesmen.hasil_dt.username')
            ->addColumn('aksi', 'admin.asesmen.hasil_dt.aksi')
            ->addColumn('created_date', 'admin.asesmen.dt.created_date')
            ->addColumn('status', 'admin.asesmen.hasil_dt.status')
            ->rawColumns(['username', 'aksi', 'created_date', 'status'])
            ->toJson();
    }

    public function updateStatus($id)
    {
        $data = JawabanAsesmen::findOrFail($id);

        $data->update([
            'status' => 1,
        ]);

        return redirect()
            ->route('hasil-asesmen')
            ->with(['success' => 'Jawaban ID ' . $data->id . ' sudah dicek!']);
    }
}
