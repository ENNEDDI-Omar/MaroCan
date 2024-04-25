<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('football_match_referee', function (Blueprint $table) {
            $table->id();
            $table->foreignId('football_match_id')->constrained('football_matches')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('referee_id')->constrained('referees')->cascadeOnDelete()->cascadeOnUpdate();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('football_match_referee');
    }
};

