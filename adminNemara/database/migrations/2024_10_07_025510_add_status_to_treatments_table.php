<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToTreatmentsTable extends Migration
{
    public function up()
    {
        Schema::table('treatments', function (Blueprint $table) {
            $table->string('status')->default('pending'); // Add status column, default is 'pending'
        });
    }

    public function down()
    {
        Schema::table('treatments', function (Blueprint $table) {
            $table->dropColumn('status'); // Remove status column if rolling back
        });
    }
}
