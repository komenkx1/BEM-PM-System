<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanSertifikatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_sertifikats', function (Blueprint $table) {
            $table->id();
            $table->string('tipe_sertifikat');
            $table->string('kementrian_yang_mengajukan');
            $table->string('jabatan');
            $table->string('deskripsi_kegiatan');
            $table->string('nama_lengkap_pembicara');
            $table->string('file_excel_nama');
            $table->string('nomor_sertif');
            $table->string('nama_kegiatan');
            $table->date('hari_tanggal');
            $table->string('bertempat_di');
            $table->string('cap');
            $table->string('tambah_ttd_menteri')->nullable();
            $table->string('nama_lengkap_menteri')->nullable();
            $table->string('nim_menteri')->nullable();
            $table->string('file_ttd_menteri')->nullable();
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
        Schema::dropIfExists('pengajuan_sertifikats');
    }
}
