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
        Schema::create('orders',function (Blueprint $table){
            $table->id();
            $table->string('customer',50);
            $table->string('phone',15);
            $table->string('email',40);
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('source_id')->constrained('sources');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
