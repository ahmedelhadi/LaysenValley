<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('sub_title')->nullable();
            $table->string('slug');
            $table->longText('desc')->nullable();
            $table->string('icon')->nullable();         
            $table->string('image')->nullable();         
            $table->integer('sort')->default(1);
            $table->boolean('is_active')->default(1);
            $table->unsignedBigInteger('slider_id')->nullable();
            $table->foreign('slider_id')->references('id')->on('sliders')->onDelete('set null');
            $table->softDeletes();
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
        Schema::dropIfExists('pages');
    }
}
