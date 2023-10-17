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
        Schema::create('s_t_u_d_e_n_t_s', function (Blueprint $table) {
            $table->string('S_ID')->primary();
            $table->string('NAME');
            $table->string('C_ID');
            $table->string('ARCH_ID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_t_u_d_e_n_t_s');
    }
};
