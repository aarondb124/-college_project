<?php

use App\Models\RecordingMode;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordingModesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recording_modes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $monitor = new RecordingMode();
        $monitor->name = '4K';
        $monitor->save();
        $monitor = new RecordingMode();
        $monitor->name = 'Full HD';
        $monitor->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recording_modes');
    }
}
