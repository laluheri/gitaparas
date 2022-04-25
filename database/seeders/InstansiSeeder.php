<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class InstansiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table("instansi")->truncate();
        $instansi =array (
            "BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA",
            "BADAN KESATUAN BANGSA DAN POLITIK",
            "BADAN KEUANGAN DAN ASET DAERAH", 
            "BADAN PENANGGULANGAN BENCANA DAERAH",  
            "BADAN PENDAPATAN DAERAH",
            "BADAN PERENCANAAN PEMBANGUNAN DAERAH",
            "DINAS KEPENDUDUKAN DAN PENCATATAN SIPIL",
            "DINAS KESEHATAN",
            "DINAS KETAHANAN PANGAN, PERTANIAN DAN PERIKANAN",
            "DINAS KOMUNIKASI DAN INFORMATIKA",
            "DINAS KOPERASI, USAHA KECIL DAN MENENGAH, PERINDUSTRIAN DAN PERDAGANGAN",
            "DINAS LINGKUNGAN HIDUP",
            "DINAS PARIWISATA",
            "DINAS PEKERJAAN UMUM, PENATAAN RUANG, PERUMAHAN DAN KAWASAN PERMUKIMAN",
            "DINAS PEMADAM KEBAKARAN DAN PENYELAMATAN",
            "DINAS PENANAMAN MODAL, PELAYANAN TERPADU SATU PINTU, DAN TENAGA KERJA",
            "DINAS PENDIDIKAN, KEBUDAYAAN, PEMUDA DAN OLAHRAGA",
            "DINAS PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA, PEMBERDAYAAN MASYARAKAT DAN DESA",
            "DINAS PERHUBUNGAN",
            "DINAS PERPUSTAKAAN DAN KEARSIPAN",
            "DINAS SOSIAL, PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK",
            "INSPEKTORAT DAERAH",
            "KANTOR CAMAT BAYAN",
            "KANTOR CAMAT GANGGA",
            "KANTOR CAMAT KAYANGAN",
            "KANTOR CAMAT PEMENANG",
            "KANTOR CAMAT TANJUNG",
            "SATUAN POLISI PAMONG PRAJA",
            "SEKRETARIAT DAERAH",
            "SEKRETARIAT DPRD"
        );

        for ($i=0; $i < sizeof($instansi); $i++) { 
            $administrator = new \App\Models\Instansi;
            $administrator->nama = $instansi[$i];
            $administrator->save();

            $this->command->info("Instansi baru berhasil diinsert");
        }
        
    }
}
