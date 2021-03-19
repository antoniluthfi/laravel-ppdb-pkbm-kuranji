<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berkas;
use App\Models\User;
use App\Models\Pendaftaran;
use File;

class BerkasController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'OK',
            'errors' => null,
            'result' => Berkas::with('user')->get()
        ], 200);
    }

    public function getDataById($id)
    {
        $berkas = Berkas::with('user')->where('user_id', $id)->first();

        return response()->json([
            'status' => 'OK',
            'errors' => null,
            'result' => $berkas
        ], 200);
    }

    public function create(Request $request)
    {
        $input = $request->all();
        $berkas = Berkas::create($input);

        return response()->json([
            'status' => 'OK',
            'message' => 'Data berhasil ditambahkan',
            'errors' => null,
            'result' => $berkas
        ], 200);
    }

    public function upload(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::where('user_id', $id)->first();

        if($pendaftaran) {
            return response()->json([
                'status' => 'OK',
                'message' => 'Anda sudah mengunggah berkas',
                'errors' => null,
                'result' => null
            ], 200);    
        } else {
            $user = User::find($id);

            for ($i = 0; $i < count($request->file); $i++) { 
                $request->file[$i]->move(public_path('berkas'), $user->id . "_" . $user->name . "_" . $request->file[$i]->getClientOriginalName());
            }
    
            return response()->json([
                'status' => 'OK',
                'message' => 'Berkas berhasil diupload',
                'errors' => null,
                'result' => null
            ], 200);
        }

    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $berkas = Berkas::with('user')->where('user_id', $id)->first();
        $berkas->fill($input)->save();

        return response()->json([
            'status' => 'OK',
            'message' => 'Data berhasil diupdate',
            'errors' => null,
            'result' => $berkas
        ], 200);
    }

    public function delete($id)
    {
        $berkas = Berkas::where('user_id', $id)->first();

        File::delete('berkas/'.$berkas->ijazah);
        File::delete('berkas/'.$berkas->skhun);
        File::delete('berkas/'.$berkas->kartu_keluarga);
        File::delete('berkas/'.$berkas->raport);

        $berkas->delete();

        return response()->json([
            'status' => 'OK',
            'message' => 'Data berhasil dihapus',
            'errors' => null,
            'result' => $berkas
        ], 200);
    }
}
