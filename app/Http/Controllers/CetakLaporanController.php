<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use App\Models\User;
use PDF;

class CetakLaporanController extends Controller
{
    public function cetakLaporan($tipeLaporan, $str = null)
    {
        if($tipeLaporan === 'data-user' || $tipeLaporan === 'kartu-pendaftaran') {
            $data = User::with('pendaftaran')->where('id', $str)->first();
            $array = ['data' => $data];
        }

        $pdf = PDF::loadView($tipeLaporan, $array, [], [
            'mode'                 => '',
            'format'               => 'A4',
            'default_font_size'    => '12',
            'margin_left'          => 2,
            'margin_right'         => 2,
            'margin_top'           => 2,
            'margin_bottom'        => 2,
            'margin_header'        => 1,
            'margin_footer'        => 1,
            'orientation'          => 'P',
            'title'                => $tipeLaporan,
            'author'               => 'Antoni Luthfi',
            'watermark'            => '',
            'show_watermark'       => false,
            'watermark_font'       => 'sans-serif',
            'display_mode'         => 'real',
            'watermark_text_alpha' => 0.1,
            'custom_font_dir'      => '',
            'custom_font_data' 	   => [],
            'auto_language_detection'  => false,
            'temp_dir'               => rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR),
            'pdfa' 			=> false,
            'pdfaauto' 		=> false,
        ]);
        return $pdf->stream("$tipeLaporan.pdf");
    }
}
