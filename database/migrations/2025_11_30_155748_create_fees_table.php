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
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            // সম্পর্কিত ছাত্র
                $table->foreignId('student_id')
                    ->constrained('students')
                    ->onDelete('cascade');

                // ফি এর পরিমাণ
                $table->decimal('amount', 10, 2);

                // ফি প্রদানের তারিখ
                $table->date('date');

                // ফি এর স্ট্যাটাস (optional: paid/unpaid)
                $table->boolean('is_paid')->default(true);



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
