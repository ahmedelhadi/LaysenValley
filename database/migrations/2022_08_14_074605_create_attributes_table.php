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
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->morphs('attributable');
            $table->text('title');
            $table->text('sub_title');
            $table->string('slug');
            $table->longText('desc')->nullable();
            $table->string('counter')->nullable();   
            $table->string('icon')->nullable();   
            $table->string('image')->nullable();   
            $table->string('video_id')->nullable();   
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->string('sort')->default(1);
            $table->integer('is_active')->default(1);
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
        Schema::dropIfExists('attributes');
    }
};
