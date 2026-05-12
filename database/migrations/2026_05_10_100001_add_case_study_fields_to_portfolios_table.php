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
        Schema::table('portfolios', function (Blueprint $table) {
            $table->text('overview')->nullable();
            $table->text('goals')->nullable();
            $table->text('magenta_role')->nullable();
            $table->text('impact')->nullable();
            $table->text('highlights')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn(['overview', 'goals', 'magenta_role', 'impact', 'highlights']);
        });
    }
};
