<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // name of the product
            $table->string('slug')->unique(); // slug of the product
            $table->unsignedBigInteger('category_id'); // category id of the product
            $table->text('short_description')->nullable(); // short description of the product
            $table->longtext('description')->nullable(); // description of the product
            $table->string('thumbnail')->nullable(); // thumbnail of the product
            $table->json('images')->nullable(); // images of the product
            $table->integer('regular_price'); // regular price of the product
            $table->integer('sale_price')->nullable(); // sale price of the product
            $table->integer('stock_status')->default(1); // stock status of the product
            $table->integer('available_quantity')->default(0); // available quantity of the product
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
