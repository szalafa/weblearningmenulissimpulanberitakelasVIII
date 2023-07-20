<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\VarDumper\Caster\RedisCaster;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.user.index');
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
    public function store(UserStoreRequest $request)
    {
        try {
            $data = User::create([
                'name' => $request->nama,
                'email' => $request->email,
                // 'password' => $request->password, 
                'password'=>Hash::make( $request->password),
                'role' => $request->role,
                'status' => $request->status,
            ]);

            return redirect()
                ->route('user.index')
                ->with(['success' => 'Data ' . substr(Crypt::encrypt($data->id), 0, 10) . ' berhasil ditambahkan']);
        } catch (\Exception $e) {
            return redirect()
                ->route('user.index')
                ->with(['error' => 'Data ' . substr(Crypt::encrypt($data->id), 0, 10) . ' gagal ditambahkan']);
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
        $data = User::find(Crypt::decrypt($id));

        return view('admin.user.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        $data = User::find($id);

        try {
            $data->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'status' => $request->status,
            ]);

            // Password Exist?
            if ($request->password) {
                $data->update([
                    'password' => Hash::make($request->password),
                ]);
            }

            return redirect()
                ->route('user.index')
                ->with(['success' => 'Data ' . substr(Crypt::encrypt($data->id), 0, 10) . ' berhasil diupdate']);
        } catch (\Exception $e) {
            return redirect()
                ->route('user.index')
                ->with(['error' => 'Data ' . substr(Crypt::encrypt($data->id), 0, 10) . ' gagal diupdate']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::find(Crypt::decrypt($id));

        try {
            $data->delete();

            return redirect()
                ->route('user.index')
                ->with(['success' => 'Data ' . substr(Crypt::encrypt($data->id), 0, 10) . ' berhasil dihapus']);
        } catch (\Exception $e) {
            return redirect()
                ->route('materi.index')
                ->with(['error' => 'Data ' . substr(Crypt::encrypt($data->id), 0, 10) . ' gagal dihapus']);
        }
    }

    public function IndexTable()
    {
        return DataTables::of(User::query())
            ->addIndexColumn()
            ->addColumn('aksi', 'admin.user.dt.aksi')
            ->addColumn('role_badge', 'admin.user.dt.role')
            ->addColumn('status', 'admin.user.dt.status')
            ->addColumn('created_date', 'admin.user.dt.created_date')
            ->rawColumns(['aksi', 'role_badge', 'status', 'created_date'])
            ->toJson();
    }
}
