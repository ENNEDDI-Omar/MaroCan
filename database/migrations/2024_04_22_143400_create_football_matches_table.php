<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('football_matches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team1_id');
            $table->unsignedBigInteger('team2_id');
            $table->string('stadium');
            $table->string('city');
            $table->dateTime('match_date');
            $table->unsignedInteger('number_of_seats');
            $table->enum('status', ['available', 'sold_out'])->default('available');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('team1_id')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('team2_id')->references('id')->on('teams')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('football_matchs');
    }
};

