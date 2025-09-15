<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medicaments', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('dosage');
            $table->string('frequence');
            $table->string('duree')->nullable(); // durée du traitement, optionnelle
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // lien avec utilisateur
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medicaments');
    }
};
