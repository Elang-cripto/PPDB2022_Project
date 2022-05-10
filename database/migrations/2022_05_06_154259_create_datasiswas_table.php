<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('no_reg', 100)->nullable();
            $table->string('nis', 50)->nullable();
            $table->string('nisn', 100)->unique();
            $table->string('nama');
            $table->string('jk', 5);
            $table->string('tmp_lahir');
            $table->date('tgl_lahir');
            $table->string('nik', 100)->unique();
            $table->string('agama', 50);
            $table->string('alamat')->nullable();
            $table->string('rt', 100)->nullable();
            $table->string('rw', 100)->nullable();
            $table->string('dusun')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('propinsi')->nullable();
            $table->string('sts_tinggal')->nullable();
            $table->string('jns_tinggal')->nullable();
            $table->string('alat_trans')->nullable();
            $table->string('telp')->nullable();
            $table->string('email')->nullable();
            $table->string('anak_ke')->nullable();
            $table->string('jml_sdr')->nullable();
            $table->string('nm_ayh');
            $table->string('tlahir_ayh')->nullable();
            $table->date('lahir_ayh')->nullable();
            $table->string('pend_ayh')->nullable();
            $table->string('kerja_ayh')->nullable();
            $table->string('hasil_ayh')->nullable();
            $table->string('nik_ayh')->nullable();
            $table->string('nm_ibu');
            $table->string('tlahir_ibu')->nullable();
            $table->date('lahir_ibu')->nullable();
            $table->string('pend_ibu')->nullable();
            $table->string('kerja_ibu')->nullable();
            $table->string('hasil_ibu')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('nm_wl')->nullable();
            $table->string('tlahir_wl')->nullable();
            $table->date('lahir_wl')->nullable();
            $table->string('pend_wl')->nullable();
            $table->string('kerja_wl')->nullable();
            $table->string('hasil_wl')->nullable();
            $table->string('nik_wl')->nullable();
            $table->string('no_kk', 100)->nullable();
            $table->string('no_un', 100)->nullable();
            $table->string('no_skhun', 100)->nullable();
            $table->string('no_ijazah', 100)->nullable();
            $table->string('no_kps', 100)->nullable();
            $table->string('no_kip', 100)->nullable();
            $table->string('no_kis', 100)->nullable();
            $table->string('no_pkh', 100)->nullable();
            $table->string('beasiswa', 100)->nullable();
            $table->string('kelas_7', 100)->nullable();
            $table->string('kelas_8', 100)->nullable();
            $table->string('kelas_9', 100)->nullable();
            $table->string('kelas_aktf', 100)->nullable();
            $table->string('kelas_dig', 100)->nullable();
            $table->string('skl_asal')->nullable();
            $table->string('almt_skl')->nullable();
            $table->string('jns_masuk')->nullable();
            $table->date('tgl_masuk')->nullable();
            $table->string('ket_out')->nullable();
            $table->date('tgl_out')->nullable();
            $table->string('alasan_out')->nullable();
            $table->string('nosrt_out')->nullable();
            $table->string('status')->default('RESIDU');
            $table->string('foto')->default('default.png');
            $table->string('editor')->nullable();
            $table->string('creator')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datasiswas');
    }
}
