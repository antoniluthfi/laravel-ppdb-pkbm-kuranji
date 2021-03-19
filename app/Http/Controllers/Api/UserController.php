<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Berkas;
use App\Models\Pendaftaran;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'OK',
            'errors' => null,
            'result' => User::all()
        ], 200);
    }

    public function getDataById($id)
    {
        $user = User::find($id);

        return response()->json([
            'status' => 'OK',
            'errors' => null,
            'result' => $user
        ], 200);
    }

    public function getCurrentUser()
    {
        $user = Auth::user();
        $user['berkas'] = Berkas::where('user_id', $user['id'])->first();
        $user['pendaftaran'] = Pendaftaran::where('user_id', $user['id'])->first();

        return response()->json([
            'status' => 'OK',
            'errors' => null,
            'result' => $user
        ], 200);
    }

    public function getUserByRole($role)
    {
        $user = User::with('berkas', 'pendaftaran')->where('hak_akses', $role)->get();
        return response()->json([
            'status' => 'OK',
            'errors' => null,
            'result' => $user
        ], 200);
    }

    public function create(Request $request)
    {
        $input = $request->all();
        $user = User::create($input);

        return response()->json([
            'status' => 'OK',
            'message' => 'Data berhasil ditambahkan',
            'errors' => null,
            'result' => $user
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $input = $request->all();
        $user->fill($input)->save();

        return response()->json([
            'status' => 'OK',
            'message' => 'Data berhasil diupdate',
            'errors' => null,
            'result' => $user
        ], 200);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json([
            'status' => 'OK',
            'message' => 'Data berhasil dihapus',
            'errors' => null,
        ], 200);
    }
}
