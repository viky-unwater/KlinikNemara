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
        Schema::table('consultations', function (Blueprint $table) {
            $table->string('status')->default('pending'); // Kolom status default pending
        });
    }
    
    public function down()
    {
        Schema::table('consultations', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
    
};
