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
        Schema::create('empleado', function (Blueprint $table) {
            $table->char('empleado_codigo',7)->primary();//EPD0001
            $table->string('empleado_nombre',100);
            $table->char('empleado_area_codigo',7);
            $table->char('empleado_empresa_codigo',7);
            $table->enum('empleado_estado',['A','E'])->default('A');
            $table->timestamps();

            $table->foreign('empleado_area_codigo')->references('area_codigo')->on('area');
            $table->foreign('empleado_empresa_codigo')->references('empresa_codigo')->on('empresa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado');
    }
};
