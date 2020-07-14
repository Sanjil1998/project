<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->text('work_title')->nullable();
            $table->text('work_subtitle')->nullable();
            $table->text('work_description')->nullable();
            $table->string('work_image')->nullable();
            $table->text('work_links')->nullable();
            $table->text('work_leader')->nullable();
            $table->text('work_provider')->nullable();
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
        Schema::dropIfExists('works');
    }
}
