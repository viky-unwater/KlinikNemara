<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVisitorCountToServicesTable extends Migration
{
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            // Add visitor_count column
            $table->integer('visitor_count')->default(0); // Default value is 0
        });
    }

    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            // Remove the column in the down method
            $table->dropColumn('visitor_count');
        });
    }
}
