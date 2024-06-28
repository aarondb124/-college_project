<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code', 18);
            $table->string('name', 100);
            $table->string('slug', 130);
            $table->string('model', 130);
            $table->foreignId('category_id')
                    ->constrained('categories')
                    ->onDelete('cascade');
            $table->foreignId('sub_category_id')->nullable() 
                    ->constrained('sub_categories')
                    ->onDelete('cascade');  
           $table->foreignId('subsubcategory_id')->nullable() 
                    ->constrained('subsubcategories')
                    ->onDelete('cascade');
            $table->foreignId('brand_id')->nullable() 
                    ->constrained('brands')
                    ->onDelete('cascade'); 
            $table->foreignId('pixel_id')->nullable() 
                    ->constrained('pixels')
                    ->onDelete('cascade');  
            $table->foreignId('recording_mode_id')->nullable() 
                    ->constrained('recording_modes')
                    ->onDelete('cascade');  
            $table->foreignId('camera_format_id')->nullable() 
                    ->constrained('camera_formats')
                    ->onDelete('cascade');
            $table->foreignId('sensor_id')->nullable() 
                    ->constrained('sensors')
                    ->onDelete('cascade'); 
            $table->foreignId('effective_pixel_id')->nullable() 
                    ->constrained('effective_pixels')
                    ->onDelete('cascade');    
            $table->foreignId('monitor_size_id')->nullable() 
                    ->constrained('monitor_sizes')
                    ->onDelete('cascade'); 
            $table->decimal('price', 18,2);
            $table->text('image');
            $table->decimal('discount', 18,2)->nullable();
            $table->text('short_details')->nullable();
            $table->longText('description')->nullable();
            $table->string('is_feature',1)->nullable();
            $table->string('is_offer',1)->nullable();
            $table->string('new_status',1)->nullable();
            $table->date('deal_start')->nullable();
            $table->date('deal_end')->nullable();
            $table->boolean('status')->default(true);
            $table->string('save_by', 3);
            $table->string('update_by', 3)->nullable();
            $table->string('ip_address', 15);
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
