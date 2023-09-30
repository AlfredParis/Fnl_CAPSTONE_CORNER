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
        Schema::create('u_s_e_r__a_c_c__e_m_p_s', function (Blueprint $table) {
            $table->id('USER_ID_EMP');
            $table->string('PASSWORD');
            $table->string('EMP_ID');
            $table->string('ACCTYPE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('u_s_e_r__a_c_c__e_m_p_s');
    }
};
