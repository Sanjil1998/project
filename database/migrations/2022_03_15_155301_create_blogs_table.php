<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Facade\Ignition\IgnitionServiceProvider;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id')->unique()->autoIncrement();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('blog_title');
            $table->longText('blog_body');
            $table->tinyInteger('blog_status')->default(0);
            $table->tinyInteger('publish_status')->default(0);


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
        Schema::dropIfExists('blogs');
    }
}
