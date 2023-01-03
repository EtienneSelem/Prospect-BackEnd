<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProspectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospects', function (Blueprint $table) {
            $table->id();
            $table->string('longitude');
            $table->string('latitude');
            $table->foreignId('agent_id')->references('id')->on('users');
            $table->foreignId('commune_id')->references('id')->on('communes');
            $table->integer('zone_id');
            $table->integer('ville_id');
            $table->integer('province_id');
            $table->string('company_name', 100);
            $table->string('company_address', 200);
            $table->foreignId('type_activities_id')->references('id')->on('type_activities')->nullable();
            $table->string('company_phone', 20);
            $table->foreignId('offer_id')->references('id')->on('offres')->nullable();
            $table->string('state', 10);
            $table->unsignedBigInteger('pieces_jointes_id')->nullable();
            $table->string('remote_id');
            $table->string('visualizate')->default('non');
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
        Schema::dropIfExists('prospects');
    }
}
