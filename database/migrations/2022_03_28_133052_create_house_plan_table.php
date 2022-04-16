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
        Schema::create('house_plan', function (Blueprint $table) {
            $table->id();
            $table->string('type');

            #13 = Total number of digit. Example- $99,999,999,999.99
            #4 = value after decimal. Example - $999,999,999.9999
            $table->decimal('cost', 13, 2);

            $table->string('floor');
            $table->string('wall');
            $table->string('window');
            $table->string('ceiling');
            $table->tinyInteger('status')->default('0');
            $table->integer('created_by');
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
        Schema::dropIfExists('house_plan');
    }
};
