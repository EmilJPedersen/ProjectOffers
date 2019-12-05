<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->increments('adress_id');
            $table->integer('owner_id');
            $table->string('owner_table');
            $table->string('adress_type');
            $table->string('line_1');
            // $table->string('line_2');
            $table->string('city'); //suburb
            // $table->string('state');
            // $table->string('region');
            // $table->string('country');
            $table->string('post_code', 4);
            $table->date('date_created');
            $table->date('date_updated');
            // $table->string('create_user_id');
            // $table->string('update_user_id');
            // $table->string('create_ip_address');
            // $table->string('update_ip_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address');
    }
}
