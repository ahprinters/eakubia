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
        Schema::table('addresses', function (Blueprint $table) {
            $table->morphs('addressable');
            
            // ২. Address Type কলাম যুক্ত করা
            $table->enum('address_type', ['current', 'permanent'])
            ->nullable()
            ->after('addressable_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('addresses', function (Blueprint $table) {
            $table->dropMorphs('addressable');
            $table->dropColumn('address_type');
        });
    }
};
