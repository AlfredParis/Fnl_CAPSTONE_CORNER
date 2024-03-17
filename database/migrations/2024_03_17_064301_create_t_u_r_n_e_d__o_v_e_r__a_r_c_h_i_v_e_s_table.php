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
        Schema::create('TRND_OVER_ARCH', function (Blueprint $table) {
            $table->id();
            $table->string('ARCH_ID');
            $table->string('GROUP_ID');
            $table->string('ADVISER_ID');
            $table->string('TITLE');
            $table->string('ABS');
            $table->string('DEPT_ID');
            $table->string('DOCU');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TRND_OVER_ARCH');
    }
};
