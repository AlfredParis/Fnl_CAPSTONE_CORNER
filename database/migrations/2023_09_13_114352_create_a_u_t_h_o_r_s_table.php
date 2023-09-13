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
        Schema::create('a_u_t_h_o_r_s', function (Blueprint $table) {
            $table->id('AUTHOR_ID');
            $table->string('S_ID');
            $table->string('ARCH_ID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('a_u_t_h_o_r_s');
    }
};
