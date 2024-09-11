<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('prendas', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('talla');
        $table->integer('cantidad_inicial')->default(0);
        $table->integer('ventas_del_dia')->default(0);
        $table->integer('cantidad_actual')->default(0);
        $table->integer('sobrante_del_dia_anterior')->default(0);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prendas');
    }
};
