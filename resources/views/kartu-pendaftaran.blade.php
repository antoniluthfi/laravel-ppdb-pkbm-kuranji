<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ public_path('css/app.css') }}">
    <title>Data User</title>
</head>
<body>
    <nav class="navbar navbar-light">
        <div class="container">
            <div class="row">
                <div class="float-left" style="width: 10%;">
                    <img src="https://drive.google.com/thumbnail?id=1h1yJsVrcg26k3o-50--Pf-z0KZefHncQ" width="80" height="80" alt="">
                </div>
                <div class="float-left" style="width: 79%;">        
                    <h1 class="text-center display-4 mt-0 mb-0 p-0">PUSAT KEGIATAN BELAJAR MASYARAKAT</h1>
                    <h1 class="text-center display-4 mt-0 mb-0 p-0">PKBM KURANJI</h1>
                    <h1 class="text-center display-5 mt-0 mb-0 p-0">NPSN : P2964925 "TERAKREDITASI B"</h1>
                    <p class="text-center lead-4 mt-0 mb-0 p-0">Izin operasional Disdik No: 25 tahun 2013 - Notaris Martius, SH No: 02 Tahun 2009</p>
                    <p class="text-center lead-4 mt-0 mb-0 p-0">Jl. A Yani Km.28 Kuranji.Komp Hasta Karya No.33 Kelurahan Guntung Manggis Kota Banjarbaru</p>
                    <p class="text-center lead-4 mt-0 mb-0 p-0">Telp/Hp. 081351450203 - Email: <a>pkbmkuranjibjb@gmail.com</a></p>
                </div>
                <div class="float-right" style="width: 10%;">
                    <img src="https://drive.google.com/thumbnail?id=1YWZIOUMli3tzSzhe-Hot-bXl_JN4HbHs" width="80" height="80" alt="">
                </div>
            </div>
        </div>            
    </nav>
    <hr class="text-dark mt-0 mb-0 p-0"> 
    <hr class="text-dark mt-0 mb-0 p-0"> 
    <hr class="text-dark mt-0 mb-0 p-0"> 
    <hr class="text-dark mt-0 mb-0 p-0"> 
    <hr class="text-dark mt-1 mb-0 p-0"> 

    <h3 class="display-5">Data Diri</h3>

    <table>
        <tr>
            <th class="text-left"><p class="lead-2 mt-0 mb-0 p-0">No Pendaftaran</p></th>
            <td>: {{ $data->pendaftaran->id }}</td>
        </tr>
        <tr>
            <th class="text-left"><p class="lead-2 mt-0 mb-0 p-0">Nama</p></th>
            <td>: {{ ucwords($data->name) }}</td>
        </tr>
        <tr>
            <th class="text-left"><p class="lead-2 mt-0 mb-0 p-0">NIK</p></th>
            <td>: {{ $data->nik }}</td>
        </tr>
        <tr>
            <th class="text-left"><p class="lead-2 mt-0 mb-0 p-0">TTL</p></th>
            <td>: {{ ucwords($data->tempat_lahir) . ", " . $data->tgl_lahir }}</td>
        </tr>
        <tr>
            <th class="text-left"><p class="lead-2 mt-0 mb-0 p-0">Jenis Kelamin</p></th>
            <td>: {{ ucwords($data->jenis_kelamin) }}</td>
        </tr>
        <tr>
            <th class="text-left"><p class="lead-2 mt-0 mb-0 p-0">Nomor HP</p></th>
            <td>: {{ $data->nomorhp }}</td>
        </tr>
        <tr>
            <th class="text-left"><p class="lead-2 mt-0 mb-0 p-0">Alamat</p></th>
            <td>: {{ $data->alamat }}</td>
        </tr>
        <tr>
            <th class="text-left"><p class="lead-2 mt-0 mb-0 p-0">Kelurahan</p></th>
            <td>: {{ ucwords($data->kelurahan) }}</td>
        </tr>
        <tr>
            <th class="text-left"><p class="lead-2 mt-0 mb-0 p-0">Kecamatan</p></th>
            <td>: {{ ucwords($data->kecamatan) }}</td>
        </tr>
        <tr>
            <th class="text-left"><p class="lead-2 mt-0 mb-0 p-0">Kabupaten</p></th>
            <td>: {{ ucwords($data->kabupaten) }}</td>
        </tr>
        <tr>
            <th class="text-left"><p class="lead-2 mt-0 mb-0 p-0">Anak Ke</p></th>
            <td>: {{ $data->anak_ke }}</td>
        </tr>
        <tr>
            <th class="text-left"><p class="lead-2 mt-0 mb-0 p-0">Jumlah Saudara</p></th>
            <td>: {{ $data->jumlah_saudara }}</td>
        </tr>
        <tr>
            <th class="text-left"><p class="lead-2 mt-0 mb-0 p-0">Pendidikan Terakhir</p></th>
            <td>: {{ strtoupper($data->pendidikan_terakhir) }}</td>
        </tr>
        <tr>
            <th class="text-left"><p class="lead-2 mt-0 mb-0 p-0">Sekolah Asal</p></th>
            <td>: {{ ucwords($data->sekolah_asal) }}</td>
        </tr>
        <tr>
            <th class="text-left"><p class="lead-2 mt-0 mb-0 p-0">Tahun Lulus</p></th>
            <td>: {{ $data->tahun_lulus }}</td>
        </tr>
        <tr>
            <th class="text-left"><p class="lead-2 mt-0 mb-0 p-0">Tinggi Badan</p></th>
            <td>: {{ $data->tinggi_badan }} cm</td>
        </tr>
        <tr>
            <th class="text-left"><p class="lead-2 mt-0 mb-0 p-0">Berat Badan</p></th>
            <td>: {{ $data->berat_badan }} kg</td>
        </tr>
        <tr>
            <th class="text-left"><p class="lead-2 mt-0 mb-0 p-0">Nama Ayah</p></th>
            <td>: {{ $data->nama_ayah }}</td>
        </tr>
        <tr>
            <th class="text-left"><p class="lead-2 mt-0 mb-0 p-0">Tanggal Lahir</p></th>
            <td>: {{ $data->tgl_lahir_ayah }}</td>
        </tr>
        <tr>
            <th class="text-left"><p class="lead-2 mt-0 mb-0 p-0">Pekerjaan</p></th>
            <td>: {{ $data->pekerjaan_ayah }}</td>
        </tr>
        <tr>
            <th class="text-left"><p class="lead-2 mt-0 mb-0 p-0">Nama Ibu</p></th>
            <td>: {{ $data->nama_ibu }}</td>
        </tr>
        <tr>
            <th class="text-left"><p class="lead-2 mt-0 mb-0 p-0">Tanggal Lahir</p></th>
            <td>: {{ $data->tgl_lahir_ibu }}</td>
        </tr>
        <tr>
            <th class="text-left"><p class="lead-2 mt-0 mb-0 p-0">Pekerjaan</p></th>
            <td>: {{ $data->pekerjaan_ibu }}</td>
        </tr>
    </table>
</body>
</html>