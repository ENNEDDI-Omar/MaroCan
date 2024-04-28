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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('football_match_id');
            $table->unsignedInteger('number_of_tickets');
            $table->enum('zone', ['gradins', 'tribunes', 'vip'])->default('gradins');
            $table->unsignedInteger('total_price');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('football_match_id')->references('id')->on('football_matches')->onDelete('cascade');

            $table->unique(['user_id', 'football_match_id'], 'user_match_unique')->comment('A user can reserve only once for a match');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
