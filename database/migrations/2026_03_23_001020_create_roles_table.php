<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
        $table->id();
        $table->string('name')->unique();
        $table->string('description')->nullable();
        $table->string('color')->nullable();
        /*
        Пусть будут базово только такие цвета для роли
            'gray'
            'red'
            'green'
            'blue'
        */
        $table->timestamps();
    });
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
