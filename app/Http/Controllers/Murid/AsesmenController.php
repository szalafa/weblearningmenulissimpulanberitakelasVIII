<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use App\Models\Asesmen;
use App\Models\JawabanAsesmen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AsesmenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asesmen = Asesmen::get();
        $user = JawabanAsesmen::where('user_id', Auth::user()->id)->first();

        return view('murid.asesmen', compact('asesmen', 'user'));
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
        $count = count($request->all()) - 1;

        $data = JawabanAsesmen::create([
            'user_id' => Auth::user()->id,
            'jawaban_asesmen_1' => $request->jawaban_asesmen_1,
            'jawaban_asesmen_2' => $request->jawaban_asesmen_2,
            'jawaban_asesmen_3' => $request->jawaban_asesmen_3,
            'jawaban_asesmen_4' => $request->jawaban_asesmen_4,
            'jawaban_asesmen_5' => $request->jawaban_asesmen_5,
        ]);

        return redirect()
            ->route('learning')
            ->with(['success' => 'Jawaban asesmen berhasil dikirim']);
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
}
