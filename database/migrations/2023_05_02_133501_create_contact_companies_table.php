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
        Schema::create('contact_companies', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('identification', 50);
            $table->string('email', 80);
            $table->string('extra', 255);
            $table->foreignId('contact_general_id')->onDelete('cascade');
            $table->enum('choices', ['advert', 'post','course','movie','other']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_companies');
    }
};
