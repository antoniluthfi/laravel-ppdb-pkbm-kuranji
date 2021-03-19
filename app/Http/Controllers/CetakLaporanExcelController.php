<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class CetakLaporanExcelController extends Controller
{
    public function exportUser()
    {
        $inputFileType = 'Xlsx';
        $inputFileName = public_path('excel/data-user.xlsx');

        $styleArray = array(
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
            'alignment' => array(
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ),
            'font' => array(
                'name' => 'Times New Roman',
                'size' => 10
            ),

        );

        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
        $reader->setLoadAllSheets();
        $spreadsheet = $reader->load($inputFileName);
        
        $user = User::where('hak_akses', 'siswa')->get();

        $cell = 2;
        $no = 1;
        foreach($user as $row) {
            $spreadsheet->getActiveSheet('A'.$cell, 0)
                ->setCellValue('A'.$cell, $no)
                ->setCellValue('B'.$cell, $row->name)
                ->setCellValue('C'.$cell, $row->email)
                ->setCellValue('D'.$cell, $row->nik)
                ->setCellValue('E'.$cell, $row->tempat_lahir . ", " . $row->tgl_lahir)
                ->setCellValue('F'.$cell, $row->jenis_kelamin)
                ->setCellValue('G'.$cell, $row->anak_ke)
                ->setCellValue('H'.$cell, $row->jumlah_saudara)
                ->setCellValue('I'.$cell, $row->pendidikan_terakhir)
                ->setCellValue('J'.$cell, $row->sekolah_asal)
                ->setCellValue('K'.$cell, $row->tahun_lulus)
                ->setCellValue('L'.$cell, $row->tinggi_badan)
                ->setCellValue('M'.$cell, $row->berat_badan)
                ->setCellValue('N'.$cell, $row->nama_ayah)
                ->setCellValue('O'.$cell, $row->tgl_lahir_ayah)
                ->setCellValue('P'.$cell, $row->pekerjaan_ayah)
                ->setCellValue('Q'.$cell, $row->nama_ibu)
                ->setCellValue('R'.$cell, $row->tgl_lahir_ibu)
                ->setCellValue('S'.$cell, $row->pekerjaan_ibu)
                ->setCellValue('T'.$cell, $row->nomorhp)
                ->setCellValue('U'.$cell, $row->alamat)
                ->setCellValue('V'.$cell, $row->kelurahan)
                ->setCellValue('W'.$cell, $row->kecamatan)
                ->setCellValue('X'.$cell, $row->kabupaten)
                ->getStyle('A'.$cell.':X'.$cell)->applyFromArray($styleArray)->getAlignment()->setWrapText(false);
            $cell++;
            $no++;
        }

        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('U')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('V')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('W')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('X')->setAutoSize(true);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="data-user.xlsx"');
        ob_clean();
        flush();
        $writer = new Xlsx($spreadsheet);        
        $writer->save('php://output');
    }

    public function exportAdministrator()
    {
        $inputFileType = 'Xlsx';
        $inputFileName = public_path('excel/data-admin.xlsx');

        $styleArray = array(
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
            'alignment' => array(
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ),
            'font' => array(
                'name' => 'Times New Roman',
                'size' => 10
            ),

        );

        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
        $reader->setLoadAllSheets();
        $spreadsheet = $reader->load($inputFileName);
        
        $user = User::where('hak_akses', 'administrator')->get();
        
        $cell = 2;
        $no = 1;
        foreach($user as $row) {
            $spreadsheet->getActiveSheet('A'.$cell, 0)
                ->setCellValue('A'.$cell, $no)
                ->setCellValue('B'.$cell, $row->name)
                ->setCellValue('C'.$cell, $row->email)
                ->setCellValue('D'.$cell, $row->nik)
                ->setCellValue('E'.$cell, $row->tempat_lahir . ", " . $row->tgl_lahir)
                ->setCellValue('F'.$cell, $row->jenis_kelamin)
                ->setCellValue('G'.$cell, $row->alamat)
                ->getStyle('A'.$cell.':G'.$cell)->applyFromArray($styleArray)->getAlignment()->setWrapText(false);
            $cell++;
            $no++;
        }

        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="data-admin.xlsx"');
        ob_clean();
        flush();
        $writer = new Xlsx($spreadsheet);        
        $writer->save('php://output');
    }

    public function exportListPendaftaran($kategori, $periode)
    {
        $inputFileType = 'Xlsx';
        $inputFileName = public_path('excel/data-user.xlsx');

        $styleArray = array(
            'borders' => array(
                'allBorders' => array(
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => array('argb' => '000000'),
                ),
            ),
            'alignment' => array(
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ),
            'font' => array(
                'name' => 'Times New Roman',
                'size' => 10
            ),

        );

        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
        $reader->setLoadAllSheets();
        $spreadsheet = $reader->load($inputFileName);
        
        if($kategori === 'semua') {
            $user = DB::select("SELECT * FROM `pendaftaran` 
                                LEFT JOIN users ON pendaftaran.user_id = users.id
                                WHERE pendaftaran.periode = '$periode'");
        } else {
            $user = DB::select("SELECT * FROM `pendaftaran` 
                                LEFT JOIN users ON pendaftaran.user_id = users.id
                                WHERE pendaftaran.periode = '$periode'
                                AND pendaftaran.status = '$kategori'");
        }

        $cell = 2;
        $no = 1;
        foreach($user as $row) {
            $spreadsheet->getActiveSheet('A'.$cell, 0)
                ->setCellValue('A'.$cell, $no)
                ->setCellValue('B'.$cell, $row->name)
                ->setCellValue('C'.$cell, $row->email)
                ->setCellValue('D'.$cell, $row->nik)
                ->setCellValue('E'.$cell, $row->tempat_lahir . ", " . $row->tgl_lahir)
                ->setCellValue('F'.$cell, $row->jenis_kelamin)
                ->setCellValue('G'.$cell, $row->anak_ke)
                ->setCellValue('H'.$cell, $row->jumlah_saudara)
                ->setCellValue('I'.$cell, $row->pendidikan_terakhir)
                ->setCellValue('J'.$cell, $row->sekolah_asal)
                ->setCellValue('K'.$cell, $row->tahun_lulus)
                ->setCellValue('L'.$cell, $row->tinggi_badan)
                ->setCellValue('M'.$cell, $row->berat_badan)
                ->setCellValue('N'.$cell, $row->nama_ayah)
                ->setCellValue('O'.$cell, $row->tgl_lahir_ayah)
                ->setCellValue('P'.$cell, $row->pekerjaan_ayah)
                ->setCellValue('Q'.$cell, $row->nama_ibu)
                ->setCellValue('R'.$cell, $row->tgl_lahir_ibu)
                ->setCellValue('S'.$cell, $row->pekerjaan_ibu)
                ->setCellValue('T'.$cell, $row->nomorhp)
                ->setCellValue('U'.$cell, $row->alamat)
                ->setCellValue('V'.$cell, $row->kelurahan)
                ->setCellValue('W'.$cell, $row->kecamatan)
                ->setCellValue('X'.$cell, $row->kabupaten)
                ->getStyle('A'.$cell.':X'.$cell)->applyFromArray($styleArray)->getAlignment()->setWrapText(false);
            $cell++;
            $no++;
        }

        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('U')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('V')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('W')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('X')->setAutoSize(true);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="pendaftaran.xlsx"');
        ob_clean();
        flush();
        $writer = new Xlsx($spreadsheet);        
        $writer->save('php://output');
    }
}
