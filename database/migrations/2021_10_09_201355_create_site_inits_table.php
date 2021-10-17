<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteInitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_inits', function (Blueprint $table) {
            $table->id();
            $table->string('first_section_title')->nullable();
            $table->string('img_first_section')->nullable();
            $table->text('first_description')->nullable();
            $table->string('second_section_title')->nullable();
            $table->text('second_description')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('whatsapp')->nullable();
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
        Schema::dropIfExists('site_inits');
    }
}
