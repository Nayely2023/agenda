<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('contactos', function (Blueprint $table) {
        $table->id();
        $table->string('apellido_paterno');
        $table->string('apellido_materno')->nullable();
        $table->string('nombre');
        $table->string('telefono')->nullable();
        $table->string('email')->unique();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactos');
    }
};
