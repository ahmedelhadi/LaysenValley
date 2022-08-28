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
        Schema::create('gallery_items', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->string('slug');
            $table->text('subtitle')->nullable();
            $table->longText('desc')->nullable();
            $table->string('icon')->nullable();
            $table->string('image');
            $table->string('video')->nullable();
            $table->string('sort')->default(1);
            $table->integer('is_active')->default(1);
            $table->unsignedBigInteger('gallery_id')->nullable();
            $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('set null');
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
        Schema::dropIfExists('gallery_items');
    }
};
