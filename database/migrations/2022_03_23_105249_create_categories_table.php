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
            
            $table->tinyInteger('status');
            $table->tinyText('feature');
            $table->tinyInteger('created_by')->default(0); #user id kung sino nag gawa
            $table->timestamps(); #created_at
            $table->softDeletes(); #deleted_at
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
