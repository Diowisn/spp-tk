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
        Schema::create('spp_fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained();
            $table->decimal('amount', 10, 2);
            $table->string('month'); // Contoh: "Januari", "Februari"
            $table->integer('year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spp_fees');
    }
};
