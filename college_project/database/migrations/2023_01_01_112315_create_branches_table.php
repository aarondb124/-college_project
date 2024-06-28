<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name',70);
            $table->string('city',70);
            $table->string('phone',18);
            $table->string('country',50);
            $table->text('address');
            $table->text('image')->nullable();
            $table->text('description')->nullable();
            $table->text('street_address',191)->nullable();
            $table->text('street_address2',191)->nullable();
            $table->string('postal',70)->nullable();
            $table->string('province',70)->nullable();
            $table->longText('map')->nullable();
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
        Schema::dropIfExists('branches');
    }
}
