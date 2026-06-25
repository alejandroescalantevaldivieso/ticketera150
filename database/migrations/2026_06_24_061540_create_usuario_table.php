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
        Schema::create('usuario', function (Blueprint $table) {
            $table->char('usuario_codigo',7)->primary();//USU0001
            $table->string('usuario_nombre',100)->unique();
            $table->string('usuario_contrasena');
            $table->char('usuario_empleado_codigo',7)->unique();
            $table->char('usuario_rol_codigo',7);
            $table->timestamps();

            $table->foreign('usuario_empleado_codigo')->references('empleado_codigo')->on('empleado');
            $table->foreign('usuario_rol_codigo')->references('rol_codigo')->on('rol');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
