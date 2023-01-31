<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->integer('nis')->unique();
            $table->bigInteger('nisn')->unique();
            $table->string('nama');
            $table->string('asal_kelas');
            $table->string('kelas_tujuan')->nullable();
            $table->float('agama')->default(0);
            $table->float('pkn')->default(0);
            $table->float('bahasa_indonesia')->default(0);
            $table->float('bahasa_inggris')->default(0);
            $table->float('matematika')->default(0);
            $table->float('fisika')->default(0);
            $table->float('kimia')->default(0);
            $table->float('biologi')->default(0);
            $table->float('ekonomi')->default(0);
            $table->float('geografi')->default(0);
            $table->float('sosiologi')->default(0);
            $table->float('penjaskes')->default(0);
            $table->float('seni_budaya')->default(0);
            $table->float('sejarah_indonesia')->default(0);
            $table->float('informatika')->default(0);
            $table->float('bahasa_jawa')->default(0);
            $table->float('prakarya')->default(0);
            $table->float('bimbingan_konseling')->default(0);
            $table->float('nilai_akhir')->nullable();
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
        Schema::dropIfExists('siswas');
    }
};
