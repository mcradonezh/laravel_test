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
            $table->timestamps();
            $table->string("name");
            $table->integer("price");
        });

        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("user_id");
            $table->integer("product_id");
            $table->integer("count");
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->json("products");
            $table->integer("user_id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('cart');
        Schema::dropIfExists('orders');
    }
};
