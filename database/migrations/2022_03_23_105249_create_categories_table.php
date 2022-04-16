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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); #category name
            $table->string('slug');
            $table->mediumText('description');            
            $table->string('image')->nullable(); #image name

            $table->string('meta_title');
            $table->text('meta_description');
            $table->text('meta_keyword');
            
            $table->tinyInteger('navbar_status')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('created_by')->default(0); #user id kung sino nag gawa
            $table->timestamps(); #created_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
