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
        Schema::create('newsposts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('date');
            $table->string('email');
            $table->string('image');
            $table->string('authorname');
            $table->string('gender');
            $table->string('category_for');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newsposts');
    }
};
