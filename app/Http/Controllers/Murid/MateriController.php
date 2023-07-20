<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Materi::orderBy('order', 'ASC')->get();

        return view('murid.materi', compact('data'));
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
        $materiCheck = Materi::count();

        if ($materiCheck == 0) {
            return view('murid.materi_null');
        }

        $sum = Materi::count();

        if ($id < 1) {
            $data = Materi::where('order', 1)->firstOrFail();
        } else {
            $data = Materi::where('order', $id)->firstOrFail();
        }

        return view('murid.materi', compact('data', 'sum'));
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
