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
    Schema::create('perusahaans', function (Blueprint $table) {
        $table->id();
        $table->string('nama_perusahaan');
        $table->string('logo')->nullable();
        $table->text('alamat');
        $table->string('email')->unique();
        $table->string('telepon', 20);
        $table->string('website')->nullable();
        $table->text('deskripsi')->nullable();
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaans');
    }
};
