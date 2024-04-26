<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();# Order id ( foreign id ) column is for "Order it's associated with each order items"
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();# Product id ( foreign id ) column is for "Product it's associated with each order items"
            $table->integer('qty'); # Qty column is for "Product quantity customer purchased in this product"
            $table->decimal('unit_price', 8, 2); # Unit price column is for "Product price"
            $table->decimal('total_price', 8, 2);# Total price column is for "Product price x quantity"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
