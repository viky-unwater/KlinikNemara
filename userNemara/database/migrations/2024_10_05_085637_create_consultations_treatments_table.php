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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('gender');
            $table->date('birth_date');
            $table->text('complaint');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->timestamps();
        });
    
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('gender');
            $table->date('birth_date');
            $table->date('last_facial')->nullable(); 
            $table->string('treatment_type'); 
            $table->boolean('needs_consultation');
            $table->date('appointment_date');
            $table->time('appointment_time');
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
        Schema::dropIfExists('treatments'); // Hapus tabel treatments terlebih dahulu
        Schema::dropIfExists('consultations'); // Hapus tabel consultations setelahnya
    }
};
