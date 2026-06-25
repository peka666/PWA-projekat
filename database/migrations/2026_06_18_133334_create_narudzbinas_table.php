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
        Schema::create('narudzbinas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users");
            $table->float("ukupno");
            $table->date("datum");
            $table->string("adresa");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('narudzbinas');
    }
};
