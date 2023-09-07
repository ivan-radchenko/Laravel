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
        Schema::create('rssnews', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('link');
            $table->text('description');
            $table->string('pubDate');
            $table->string('author');
            $table->string('category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rssnews');
    }
};
