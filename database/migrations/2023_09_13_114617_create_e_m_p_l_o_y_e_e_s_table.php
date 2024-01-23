<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('e_m_p_l_o_y_e_e_s', function (Blueprint $table) {
            $table->string('EMP_ID')->primary();
            $table->string('NAME');
            $table->string('EMP_DEPT');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('e_m_p_l_o_y_e_e_s');
    }
};
