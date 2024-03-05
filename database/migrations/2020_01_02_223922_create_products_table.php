<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('hash')->nullable();
            $table->text('address')->nullable();
            $table->text('city')->nullable();
            $table->text('country')->nullable();
            $table->text('street')->nullable();
            $table->text('lat')->nullable();
            $table->text('lon')->nullable();
            $table->text('zip')->nullable();
            $table->text('category')->nullable();

            $table->text('email')->nullable();
            $table->text('phone')->nullable();
            $table->text('web')->nullable();
            $table->text('facebook')->nullable();
            $table->text('instagram')->nullable();
            $table->text('tiktok')->nullable();

            $table->longText('working_hours')->nullable();
            $table->longText('menu')->nullable();
            $table->string('image')->nullable();

            $table->integer('viewed')->unsigned()->default(0);
            $table->integer('sort_order')->unsigned()->default(0);
            $table->boolean('featured')->default(false);
            $table->boolean('status')->default(false);
            $table->timestamps();
        });


        Schema::create('product_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->index();
            $table->string('lang', 2)->default(config('app.locale'));
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('slug');
            $table->string('url', 255);
            $table->timestamps();

            $table->foreign('product_id')
                  ->references('id')->on('products')
                  ->onDelete('cascade');
        });


        /*Schema::create('product_to_category', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->index();
            $table->unsignedBigInteger('category_id')->index();

            $table->foreign('product_id')
                  ->references('id')->on('products');

            $table->foreign('category_id')
                  ->references('id')->on('categories');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_translations');
        //Schema::dropIfExists('product_to_category');
    }
}



