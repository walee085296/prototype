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
      Schema::create('inmates', function (Blueprint $table) {
    $table->id();
    $table->string('full_name');
    $table->string('national_id')->unique();
    $table->string('inmate_code')->unique(); // رقم القيد أو الزنزانة
    $table->enum('legal_status', ['regular', 'prohibited'])->default('regular'); // حالته من الزيارة
    $table->integer('max_monthly_visits')->default(4); // الحد الأقصى للزيارات شهرياً
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inmates');
    }
};
