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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();  # User id ( foreign id ) column is for "customer ( who purchase product items )"
            $table->string('invoice_no')->unique(); # Invoice Number column is for "customer order invoice"
            $table->string('uuid');
            $table->string('tracking_no'); # Tracking Number column is for "Tracking customer orders"
            $table->integer('product_qty'); # Product qty column is for "How many product items customer bought in this order"
            $table->enum('payment_method', ['card', 'paypal', 'cash on delivery']); # Payment method column is for "Purchase options for their items" if you don't need this just skip it!!
            $table->enum('payment_status', ['pending', 'completed'])->default('pending'); # Payment status column is for "Customer is already paid for this order or not" if you don't need this just skip it!!
            $table->timestamp('purchased_at')->nullable(); # Purchased at column is for "Customer payment paid time frame"
            $table->decimal('total_amount', 8, 2);  # Total amount column is for "Total calculation amount for this order (depend on order items)"
            $table->enum('status', ['pending', 'processing', 'shipped', 'delivered'])->default('pending'); # Status column is for "Order status eg. user or customer can track their paid order items are pending or processing etc..." If you don't want just skip it!!
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
