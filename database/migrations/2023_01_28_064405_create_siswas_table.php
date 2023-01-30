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
            $table->float('indo')->default(0);
            $table->float('inggris')->default(0);
            $table->float('mtk')->default(0);
            $table->float('fisika')->default(0);
            $table->float('kimia')->default(0);
            $table->float('biologi')->default(0);
            $table->float('eko')->default(0);
            $table->float('geo')->default(0);
            $table->float('sosio')->default(0);
            $table->float('penjas')->default(0);
            $table->float('seni')->default(0);
            $table->float('sejarah')->default(0);
            $table->float('if')->default(0);
            $table->float('jawa')->default(0);
            $table->float('prakarya')->default(0);
            $table->float('bk')->default(0);
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
