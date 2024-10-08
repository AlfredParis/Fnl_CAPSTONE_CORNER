<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('t_u_r_n_e_d__o_v_e_r__a_r_c_h_i_v_e_s', function (Blueprint $table) {
            $table->id();
            $table->string('ARCH_ID');
            $table->string('GROUP_ID');
            $table->string('ADVISER_ID');
            $table->string('TITLE');
            $table->string('ABS');
            $table->string('DEPT_ID');
            $table->string('DOCU');
            $table->string('ADVS_STAT');
            $table->string('PUB_STAT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_u_r_n_e_d__o_v_e_r__a_r_c_h_i_v_e_s');
    }
};
