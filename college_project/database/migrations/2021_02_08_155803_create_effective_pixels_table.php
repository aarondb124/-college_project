<?php

use App\Models\EffectivePixel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEffectivePixelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('effective_pixels', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $effective = new EffectivePixel();
        $effective->name = '5MP';
        $effective->save();
        $effective = new EffectivePixel();
        $effective->name = '12MP';
        $effective->save();
        $effective = new EffectivePixel();
        $effective->name = '20MP';
        $effective->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('effective_pixels');
    }
}
