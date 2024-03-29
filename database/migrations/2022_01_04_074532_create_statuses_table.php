<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->string('slug')->nullable();
            $table->longText('desc')->nullable();
            $table->boolean('is_active')->default(1);
            $table->string('image')->nullable();
            $table->string('type')->default('dna');
            $table->string('color')->nullable();
            $table->integer('sort')->default('1');
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
        Schema::dropIfExists('statuses');
    }
}
