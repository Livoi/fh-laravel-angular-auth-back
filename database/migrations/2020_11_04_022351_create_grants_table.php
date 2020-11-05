<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrantsTable extends Migration
{/**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grants', function (Blueprint $table) {
            $table->id();
            $table->string('grant_name');
            $table->enum('grant_status', array('In Consideration', 'Development', 'Submitted', 'Did Not Submit', 'Implementation', 'Not Awarded', 'Closeout', 'Closed'));
            $table->string('grantor');
            $table->string('grant_geo_location');
			$table->string('grant_description');
			$table->float('grant_amount');
			$table->string('grant_amount_currency');
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
        Schema::dropIfExists('grants');
    }
}
