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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('division_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('district_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('upazila_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('union_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('ward_id')->nullable()->constrained()->onDelete('set null');
            $table->text('custom_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
