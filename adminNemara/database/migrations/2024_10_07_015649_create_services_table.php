<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Name of the treatment
            $table->text('description'); // Description of the treatment
            $table->decimal('price', 10, 2); // Price of the treatment
            $table->timestamps(); // Created at and updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('services'); // Drop the table if it exists
    }
}
