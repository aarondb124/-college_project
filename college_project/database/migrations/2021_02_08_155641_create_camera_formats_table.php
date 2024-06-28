<?php

use App\Models\CameraFormat;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCameraFormatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camera_formats', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $camera = new CameraFormat();
        $camera->name = 'Full Frame';
        $camera->save();
        $camera = new CameraFormat();
        $camera->name = 'APS-C';
        $camera->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camera_formats');
    }
}
