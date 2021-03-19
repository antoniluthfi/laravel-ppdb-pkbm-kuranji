<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\DB;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftaran = DB::select("SELECT users.*, pendaftaran.program_paket, pendaftaran.periode, pendaftaran.status, pendaftaran.created_at AS tgl_daftar FROM `pendaftaran` LEFT JOIN users ON pendaftaran.user_id = users.id");

        return response()->json([
            'status' => 'OK',
            'errors' => null,
            'result' => $pendaftaran
        ], 200);
    }

    public function getDataById($id)
    {
        $pendaftaran = Pendaftaran::with('user')->where('id', $id)->first();

        return response()->json([
            'status' => 'OK',
            'errors' => null,
            'result' => $pendaftaran
        ], 200);
    }

    public function getDataByUserId($id)
    {
        $pendaftaran = Pendaftaran::with('user')->where('user_id', $id)->first();

        return response()->json([
            'status' => 'OK',
            'errors' => null,
            'result' => $pendaftaran
        ], 200);
    }

    public function getPeriode() {
        $pendaftaran = DB::select("SELECT periode FROM `pendaftaran` GROUP BY periode");
        return response()->json([
            'status' => 'OK',
            'errors' => null,
            'result' => $pendaftaran
        ], 200);
    }

    public function getDataByProgramPaket()
    {
        $data = DB::select("SELECT 
                            COUNT(program_paket) AS total_pendaftar, 
                            periode FROM `pendaftaran` 
                            GROUP BY periode 
                            ORDER BY periode DESC 
                            LIMIT 1"
                        );

        $periode = $data[0]->periode;

        $paket_a = DB::select("SELECT program_paket FROM `pendaftaran` WHERE program_paket = 'paket a' AND periode = '$periode'");

        $paket_b = DB::select("SELECT program_paket FROM `pendaftaran` WHERE program_paket = 'paket b' AND periode = '$periode'");

        $paket_c = DB::select("SELECT program_paket FROM `pendaftaran` WHERE program_paket = 'paket c' AND periode = '$periode'");

        $diterima = DB::select("SELECT status FROM `pendaftaran` WHERE status = 'diterima' AND periode = '$periode'");

        $tidak_diterima = DB::select("SELECT status FROM `pendaftaran` WHERE status = 'tidak diterima' AND periode = '$periode'");

        $pendaftaran = [
            'total_pendaftar' => $data[0]->total_pendaftar,
            'paket_a' => count($paket_a),
            'paket_b' => count($paket_b),
            'paket_c' => count($paket_c),
            'diterima' => count($diterima),
            'tidak_diterima' => count($tidak_diterima)
        ];

        return response()->json([
            'status' => 'OK',
            'errors' => null,
            'result' => $pendaftaran
        ], 200);
    }

    public function create(Request $request)
    {
        $month = date('Y');

        $input = $request->all();
        $input['periode'] = $month . "." . $request->periode;
        $pendaftaran = Pendaftaran::create($input);

        return response()->json([
            'status' => 'OK',
            'message' => 'Data berhasil ditambahkan',
            'errors' => null,
            'result' => $pendaftaran
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $pendaftaran = Pendaftaran::with('user')->where('user_id', $id)->first();
        $pendaftaran->fill($input)->save();

        return response()->json([
            'status' => 'OK',
            'message' => 'Data berhasil diupdate',
            'errors' => null,
            'result' => $pendaftaran
        ], 200);
    }

    public function delete($id)
    {
        $pendaftaran = Pendaftaran::with('user')->where('user_id', $id)->first();
        $pendaftaran->delete();

        return response()->json([
            'status' => 'OK',
            'message' => 'Data berhasil dihapus',
            'errors' => null,
            'result' => $pendaftaran
        ], 200);
    }
}
