<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageLiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language_live', function (Blueprint $table) {
            $table->id();
	        $table->foreignId('language_id')->references('id')->on('languageinfos')->onDelete('cascade');
	        $table->foreignId('live_id')->references('id')->on('lives')->onDelete('cascade');
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
        Schema::dropIfExists('language_live');
    }
}
