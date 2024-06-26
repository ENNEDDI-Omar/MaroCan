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
        Schema::create('media_platforms', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('media_platform_code')->unique();
            $table->enum('type', ['newspaper', 'radio', 'television', 'digital_media'])->default('newspaper');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_platforms');
    }
};
