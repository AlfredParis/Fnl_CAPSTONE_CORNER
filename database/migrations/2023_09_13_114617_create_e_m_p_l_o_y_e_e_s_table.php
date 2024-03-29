<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('e_m_p_l_o_y_e_e_s', function (Blueprint $table) {

            $table->id();
            $table->string('EMP_ID');
            $table->string('NAME');
            $table->string('EMP_DEPT');
            $table->string('ADVICER_STATUS');
            $table->string('POSITION_ID');
            $table->string('PROG_ID');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('e_m_p_l_o_y_e_e_s');
    }
};
