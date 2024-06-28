<?php

use App\Models\MonitorSize;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitorSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitor_sizes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $monitor = new MonitorSize();
        $monitor->name = '3.2"/2100k';
        $monitor->save();
        $monitor = new MonitorSize();
        $monitor->name = '3.2"/1620k';
        $monitor->save();
        $monitor = new MonitorSize();
        $monitor->name = '3.0"/1040k';
        $monitor->save();
        $monitor = new MonitorSize();
        $monitor->name = '3.0"/920k';
        $monitor->save();
        $monitor = new MonitorSize();
        $monitor->name = '3.2"/2300k';
        $monitor->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monitor_sizes');
    }
}
