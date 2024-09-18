<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalesTable extends Migration
{
    public function up()
    {
        Schema::create('locales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Ej. Local 1, Local 2
            $table->string('ubicacion')->nullable(); // Ej. Dirección del local
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('locales');
    }
}

