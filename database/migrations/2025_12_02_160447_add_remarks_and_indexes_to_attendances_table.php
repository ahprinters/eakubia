<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            // নতুন কলাম যোগ করা
            $table->string('remarks')->nullable()->after('status');

            // unique constraint (একই দিনে একই student এর একটাই attendance থাকবে)
            $table->unique(['student_id', 'date']);

            // index যোগ করা (query দ্রুত হবে)
            $table->index('date');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropColumn('remarks');
            $table->dropUnique(['student_id', 'date']);
            $table->dropIndex(['date']);
            $table->dropIndex(['status']);
        });
    }
};
