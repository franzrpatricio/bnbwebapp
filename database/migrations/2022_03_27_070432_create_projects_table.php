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
        Schema::create('projects', function (Blueprint $table) {
            $table->id(); #project id
            $table->integer('category_id'); #category
            $table->integer('houseplan_id'); #house plan
            $table->string('name'); #project name
            $table->string('image')->nullable(); #image
            $table->string('vtour');
            $table->decimal('cost', 13, 2);
            $table->string('stories')->nullable();
            $table->integer('rooms')->nullable();

            #$table->string('iframe')->nullable(); 
            #this applies only if there is iframe virtual tour
            
            #SEO Tags
            $table->string('slug'); 
            $table->mediumText('description');
            $table->string('meta_title');
            $table->mediumText('meta_description')->nullable();
            $table->mediumText('meta_keyword')->nullable();

            $table->tinyInteger('status')->default('0'); #visible or not
            $table->integer('posted_by')->default('0'); #user
            $table->timestamps(); #date created
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
