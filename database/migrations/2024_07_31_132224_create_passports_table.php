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

        Schema::create('passports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('contry');
            $table->string('cartId');
            $table->string('dateDel'); // date de délivrance
            $table->string('dateExp'); // date de expériation
            $table->string('img');
            $table->string('fileName');
            //si soucis plus tard avec api ajouter id:String
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passports');
    }
};
