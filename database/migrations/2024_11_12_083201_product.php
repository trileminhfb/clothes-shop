<?php

use App\Enums\gender\gender;
use App\Enums\product\statusProduct;
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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->string('description');
            $table->string('image');
            $table->integer('quantity');
            $table->integer('status')->default(statusProduct::AVAILABLE);
            $table->integer('id_category');
            $table->integer('id_brand');
            $table->integer('gender')->default(gender::MEN);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
