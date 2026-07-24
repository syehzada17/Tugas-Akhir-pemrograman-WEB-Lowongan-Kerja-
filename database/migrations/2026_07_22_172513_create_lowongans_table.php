<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('lowongans', function (Blueprint $table) {
        $table->id();

        $table->foreignId('perusahaan_id')
              ->constrained('perusahaans')
              ->cascadeOnDelete();

        $table->string('posisi');
        $table->string('lokasi');
        $table->string('jenis_pekerjaan');
        $table->decimal('gaji', 12, 2);
        $table->text('deskripsi');
        $table->text('persyaratan');
        $table->date('deadline');
        $table->string('status')->default('Aktif');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongans');
    }
};
