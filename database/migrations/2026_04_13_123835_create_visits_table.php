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
        Schema::create('visits', function (Blueprint $table) {
    $table->id();
    $table->foreignId('inmate_id')->constrained()->onDelete('cascade');
    $table->foreignId('visitor_id')->constrained()->onDelete('cascade');
    $table->string('visit_uuid')->unique(); // الكود اللي هيتحول لـ QR
    $table->string('relation_type'); // درجة القرابة
    $table->string('status')->default('pending');
    $table->timestamp('entry_at')->nullable(); // وقت الدخول الفعلي
    $table->timestamp('exit_at')->nullable();  // وقت الخروج الفعلي
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
