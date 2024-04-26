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
        Schema::create('products', function (Blueprint $table) {
            $table->id();  # Id column is for "Product Id"
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();  # User id ( foreign id ) column is for "Product owner ( who create product or who own product eg.admin | seller ,etc... )"
            $table->foreignId("category_id")->constrained()->cascadeOnDelete();# Category id ( foreign id ) column is for "Product it's associate with this category"
            $table->string("name"); # Name column is for "Product Name"
            $table->string("slug");  # Slug column is for "Readable URL" ( This column is for optional. If you don't want to add just remove it slug column )
            $table->string("sku")->nullable();  # Sku column is for "Product Sku or Code"
            $table->integer("qty")->default(0); # Qty column is for "Product Stock"
            $table->text("description"); # Description column is for "Product Description"
            $table->string("main_image"); # Main image column is for "Product image" ( Display in product card )
            $table->decimal("price", 8, 2)->default(0.00);  # Price column is for "Product Price"
            $table->decimal("offer_price", 8, 2)->default(0.00);  # Offer Price column is for "Product Offer Price / Discount Price"
            $table->enum('status', ['draft', 'published'])->default('draft');  # Status column is for "Product is published on web or only draft"
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
