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
        Schema::table('categories', function (Blueprint $table) {
            Schema::table('categories', function (Blueprint $table) {
                $table->text('cat_description')->nullable();  // Add the new column
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            Schema::table('categories', function (Blueprint $table) {
                $table->dropColumn('cat_description');  // Remove the column if rolled back
            });
        });
    }
};
