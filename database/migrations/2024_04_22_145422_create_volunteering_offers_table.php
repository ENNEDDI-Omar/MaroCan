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
        Schema::create('volunteering_offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('football_match_id')->nullable();
            $table->string('title')->unique();
            $table->text('description');
            $table->text('position');
            $table->enum('status', ['available', 'not available'])->default('available');
            $table->unsignedInteger('number_of_volunteers');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('football_match_id')->references('id')->on('football_matches')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteering_offers');
    }
};
