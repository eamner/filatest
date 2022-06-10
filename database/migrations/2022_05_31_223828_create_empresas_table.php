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

        Schema::dropIfExists('empresas');
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('rif', 12)->unique();
            $table->string('name', 100);
            $table->year('ano_fund')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('website')->nullable();
            $table->string('street', 100)->nullable();
            //$table->unsignedBigInteger('city_id', 4);
            /*$table->integer('state_id', 4)->nullable();
            $table->integer('country_id', 4)->nullable();*/
            $table->string('linkedin_profile', 20)->nullable();
            $table->string('twitter_profile', 20)->nullable();
            $table->string('instagram_profile', 20)->nullable();
            $table->string('facebook_profile', 20)->nullable();
            $table->string('youtube_profile', 20)->nullable();

            //$table->foreign('city_id')->references('city_id')->on('addresses');
            /*$table->foreign('state_id')->references('stateId')->on('states');
            $table->foreign('country_id')->references('countryId')->on('countries');*/

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
        Schema::dropIfExists('empresas');
    }
};
