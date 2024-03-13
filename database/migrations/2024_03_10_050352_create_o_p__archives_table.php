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
        Schema::create('o_p__archives', function (Blueprint $table) {
            $table->id();
            $table->string('ARCH_NAME');
            $table->string('UPLOADER');
            $table->string('DESCRIPTION');
            $table->string('GRP_ID');
            $table->string('PDF_FILE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('o_p__archives');
    }
};
