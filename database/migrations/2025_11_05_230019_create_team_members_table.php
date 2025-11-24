<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('position');
            $table->json('summary')->nullable();
            $table->json('education')->nullable();
            $table->json('professional_background')->nullable();
            $table->json('skills')->nullable();
            $table->json('practice_areas')->nullable();
            $table->json('bar_admissions')->nullable();
            $table->json('languages')->nullable();
            $table->json('achievements')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->integer('years_of_experience')->nullable();
            $table->json('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_members');
    }
};
