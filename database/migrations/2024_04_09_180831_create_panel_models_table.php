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
        Schema::create('panel_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('GRP_ID');
            $table->unsignedBigInteger('PANEL_ID');
            $table->primary(['PANEL_ID', 'GRP_ID']);

            $table->foreign('PANEL_ID')->references('id')->on('panelists')->onDelete('cascade');
            $table->foreign('GRP_ID')->references('id')->on('groups')->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panel_models');
    }
};
