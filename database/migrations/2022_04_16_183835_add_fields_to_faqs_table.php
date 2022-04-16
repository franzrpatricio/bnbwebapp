<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faqs', function (Blueprint $table) {
            //
            $table->longText('question');
            $table->longText('answewr');
            $table->integer('posted_by')->default('0'); #user
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
        Schema::table('faqs', function (Blueprint $table) {
            //
            $table->dropColumn('question');
            $table->dropColumn('answewr');
            $table->dropColumn('posted_by');
            $table->dropsoftDeletes();
        });
    }
}
