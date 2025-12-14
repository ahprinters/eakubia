<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('custom_addresses', function (Blueprint $table) {
            $table->id();

            // Polymorphic relation
            $table->morphs('addressable');

            // Address type
            $table->enum('address_type', ['permanent', 'current']);

            // Geographical fields (correct syntax)
            $table->foreignId('division_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('district_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('upazila_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('union_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('ward_id')->nullable()->constrained()->onDelete('set null');

            // Detail address
            $table->string('detail_address', 255)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('custom_addresses');
    }
};