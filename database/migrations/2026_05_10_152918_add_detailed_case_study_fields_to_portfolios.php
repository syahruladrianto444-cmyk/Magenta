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
        Schema::table('portfolios', function (Blueprint $table) {
            $table->string('hero_image')->nullable()->after('featured_image');
            $table->string('audience_count')->nullable()->after('client');
            $table->string('cta_text')->nullable();
            $table->string('cta_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn(['hero_image', 'audience_count', 'cta_text', 'cta_link']);
        });
    }
};
