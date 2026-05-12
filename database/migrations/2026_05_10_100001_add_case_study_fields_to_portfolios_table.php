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
            $table->text('overview')->nullable()->after('description');
            $table->text('goals')->nullable()->after('overview');
            $table->text('magenta_role')->nullable()->after('goals');
            $table->text('impact')->nullable()->after('magenta_role');
            $table->text('highlights')->nullable()->after('impact');
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
