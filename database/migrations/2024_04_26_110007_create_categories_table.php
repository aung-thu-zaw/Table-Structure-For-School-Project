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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); # Id column is for "Category Id"
            $table->string("name")->unique(); # Name column is for "Product Category Name"
            $table->string("slug")->unique(); # Slug column is for "Readable URL" ( This column is for optional. If you don't want to add just remove it slug column )

            ## Notice ##
            // For status you can choose whatever you want to handle ( Enum Or Boolean ). You don't need both. Only one.
            $table->boolean("status")->default(false);
            $table->enum("status", ["show","hide"])->default("show");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
