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
        Schema::create('accreditation_badges', function (Blueprint $table) {
            $table->id();
            $table->string('badge_number')->unique();
            $table->date('expiration_date')->format('Y-m-d');
            $table->unsignedBigInteger('journalist_id');
            $table->unsignedBigInteger('mediaPlatform_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('journalist_id')->references('id')->on('journalists')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('mediaPlatform_id')->references('id')->on('media_platforms')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accriditation_badges');
    }
};
