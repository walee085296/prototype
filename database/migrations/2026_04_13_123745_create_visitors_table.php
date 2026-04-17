
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
           Schema::create('visitors', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('national_id')->unique();
    $table->string('phone')->nullable();
    $table->string('image_path')->nullable(); // مسار الصورة الشخصية
    $table->boolean('is_blacklisted')->default(false); // لو الزائر محظور أمنياً
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
