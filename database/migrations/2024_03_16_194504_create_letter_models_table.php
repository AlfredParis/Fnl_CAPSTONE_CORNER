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
        Schema::create('letter_models', function (Blueprint $table) {
            $table->id();
            $table->longText('LETTER');
            $table->string('GRP_ID');
            $table->string('STATUS');
            $table->string('IS_DONE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letter_models');
    }
};
