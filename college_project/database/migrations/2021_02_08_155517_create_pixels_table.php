<?php

use App\Models\Pixel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePixelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pixels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $pixel = new Pixel();
        $pixel->name = '32 MegaPixels';
        $pixel->save();
        $pixel = new Pixel();
        $pixel->name = '26 MegaPixels';
        $pixel->save();
        $pixel = new Pixel();
        $pixel->name = '24 MegaPixels';
        $pixel->save();
        $pixel = new Pixel();
        $pixel->name = '20 MegaPixels';
        $pixel->save();
        $pixel = new Pixel();
        $pixel->name = '18 MegaPixels';
        $pixel->save();
        $pixel = new Pixel();
        $pixel->name = '45 MegaPixels';
        $pixel->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pixels');
    }
}
