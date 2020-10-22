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
            $table->string('product_name')->unique();
            $table->string('slug')->unique();
            $table->foreignId('cat_id');
            $table->foreignId('brand_id');
            $table->float('price', 8, 2);
            $table->integer('quantity');
            $table->integer('count')->nullable()->default(0);
            $table->integer('status')->nullable()->default(0);
            $table->string('main_image')->nullable();
            $table->text('short_des');
            $table->text('long_des');
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
