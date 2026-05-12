<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('presentation_decks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('business_unit')->nullable(); // M87, BTC, 87 Studio, Gajah Contractor
            $table->string('category')->nullable(); // Government, Brand Activation, etc.
            $table->text('short_description')->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->string('pdf_file')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('presentation_decks');
    }
};
