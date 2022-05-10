<?php

namespace Database\Seeders;

use App\Models\Appsetting;
use App\Models\Asalsekolah;
use App\Models\Datasiswa;
use App\Models\Postland;
use Illuminate\Database\Seeder;

class DbsiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Datasiswa::create([
            'no_reg' => 'REG-202205051710',
            'nis' => '131235090077190001',
            'nisn' => '0029581367',
            'nama' => 'ABELLIYA FEBRIYANTI',
            'jk' => 'P',
            'tmp_lahir' => 'JEMBER',
            'tgl_lahir' => '2004-09-23',
            'nik' => '6402106309040007',
            'agama' => 'Islam',
            'nm_ayh' => 'SISWANTO',
            'nm_ibu' => 'LILIK HASANAH',
            'status' => 'RESIDU',
            'skl_asal' => 'SMPS Plus Al Amien',
            'editor' => 'Mukhammad Yasin',
            'created_at' => '2022-05-05 03:29:50',
            'updated_at' => '2022-05-05 03:29:50',
        ]);

        Datasiswa::create([
            'no_reg' => 'REG-202205051711',
            'nis' => '131235090077190002',
            'nisn' => '0040957178',
            'nama' => 'ACHMAD IRWANTO',
            'jk' => 'L',
            'tmp_lahir' => 'JEMBER',
            'tgl_lahir' => '2004-04-18',
            'nik' => '3509111804040004',
            'agama' => 'Islam',
            'nm_ayh' => 'SUKUR',
            'nm_ibu' => 'SUGIYARTI',
            'status' => 'RESIDU',
            'skl_asal' => 'SMPS Plus Al Amien',
            'editor' => 'Mukhammad Yasin',
            'created_at' => '2022-05-05 03:29:50',
            'updated_at' => '2022-05-05 03:29:50',
        ]);

        Datasiswa::create([
            'no_reg' => 'REG-202205051712',
            'nis' => '131235090077190003',
            'nisn' => '0036499495',
            'nama' => 'ACHMAT RAFI ANWAR ALFARIS',
            'jk' => 'L',
            'tmp_lahir' => 'JEMBER',
            'tgl_lahir' => '2003-08-19',
            'nik' => '3509111908030001',
            'agama' => 'Islam',
            'nm_ayh' => 'M.ANSORI',
            'nm_ibu' => 'SUSIANAH',
            'status' => 'VALID',
            'skl_asal' => 'MTs Al Amien',
            'editor' => 'Mukhammad Yasin',
            'created_at' => '2022-05-05 03:29:50',
            'updated_at' => '2022-05-05 03:29:50',
        ]);
        Datasiswa::create([
            'no_reg' => 'REG-202205051713',
            'nis' => '131235090077190004',
            'nisn' => '0045554629',
            'nama' => 'ADI PRASETIYO',
            'jk' => 'L',
            'tmp_lahir' => 'JEMBER',
            'tgl_lahir' => '2004-01-19',
            'nik' => '3509121901040003',
            'agama' => 'Islam',
            'nm_ayh' => 'MOH KOMARI',
            'nm_ibu' => 'SITI AROHMAH',
            'status' => 'INVALID',
            'skl_asal' => 'MTs. SA BUSTANUT THALABAH',
            'editor' => 'Mukhammad Yasin',
            'created_at' => '2022-05-05 03:29:50',
            'updated_at' => '2022-05-05 03:29:50',
        ]);
        Asalsekolah::create([
            'npsn' => '12345678',
            'lembaga' => 'MI Merdeka Belajar',
            'alamat' => 'Jl. Watu Ulo',
            'kelurahan' => 'Sumberejo',
            'status' => 'Swasta',
            'created_at' => '2022-05-05 03:29:50',
            'updated_at' => '2022-05-05 03:29:50',
        ]);
        Appsetting::create([
            'app_nm_lembaga' => 'MTsN Sejahtera',
            'app_almt_lembaga' => 'Jl. Kebaikan',
            'app_telp_lembaga' => '0336-342244',
            'app_mail_lembaga' => 'admin@gmail.com',
            'app_nmks_lembaga' => 'Tony Stark',
            'app_npsn_lembaga' => '99124568',
            'app_gps_lembaga' => '',
            'app_link_fb' => '',
            'app_link_yt' => '',
            'app_link_ins' => '',
            'app_tahun' => '2022',
            'created_at' => '2022-05-05 03:29:50',
            'updated_at' => '2022-05-05 03:29:50',
        ]);

        Postland::create([
            'judul_utama' => 'Better Solutions For Your Education',
            'judul_sub' => 'Panitia Penerimaan Peserta Didik Baru MTSN 10 Jember 2022-2023',
            'img_utama' => 'hero-img.png',
            'about_us' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'judul_post1' => 'Judul Post 1',
            'isi_post1' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit',
            'img_post1' => 'why-us.png',
            'judul_post2' => 'Voluptatem dignissimos provident quasi corporis voluptates',
            'isi_post2' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'img_post2' => 'skills.png',
            'created_at' => '2022-05-05 03:29:50',
            'updated_at' => '2022-05-05 03:29:50',
        ]);
    }
}
