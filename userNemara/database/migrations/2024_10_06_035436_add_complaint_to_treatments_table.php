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
        Schema::table('treatments', function (Blueprint $table) {
            $table->text('complaint')->nullable(); // You can make it nullable
        });
    }
    
    public function down()
    {
        Schema::table('treatments', function (Blueprint $table) {
            $table->dropColumn('complaint');
        });
    }
        
};
