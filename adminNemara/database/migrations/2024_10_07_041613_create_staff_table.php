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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->enum('role', ['admin', 'doctor']); // Role admin atau doctor
            $table->string('password');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('staff');
    }
    
};
