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
        Schema::create('a_r_c_h_i_v_e_s', function (Blueprint $table) {
            $table->id('ARCH_ID');
            $table->string('ARCH_NAME');
            $table->string('DESCRIPTION');
            $table->string('AUTHOR_ID');
            $table->string('GITHUB_LINK');
            $table->string('PDF_FILE');
            $table->string('IS_APPROVED');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('a_r_c_h_i_v_e_s');
    }
};
