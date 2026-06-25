<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proizvods', function (Blueprint $table) {
            $table->id();
            $table->string("naziv")->unique();
            $table->string("opis");
            $table->float("cena");
            $table->string("slika")->nullable();
            $table->enum("izdvojeno", ["izdvojeno", "Ne"]);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('proizvods');
    }
};
