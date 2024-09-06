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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->json('localisation')->nullable();
            $table->json('biens')->nullable();
            $table->string('nom');
            $table->string('prenoms');
            $table->string('email')->nullable();
            $table->string('contact');
            $table->integer('pack_id');
            $table->integer('unit_price')->nullable();
            $table->integer('price')->nullable();
            $table->tinyInteger("status")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
