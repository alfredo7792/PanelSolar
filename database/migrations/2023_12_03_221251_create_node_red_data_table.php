<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('node_red_data', function (Blueprint $table) {
            $table->id();
            $table->decimal('temperatura', 8, 2);
            $table->decimal('voltaje', 8, 2);
            $table->decimal('intensidad_luz', 8, 2);
            $table->decimal('distancia', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('node_red_data');
    }
};
