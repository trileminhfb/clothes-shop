<?php

use App\Enums\wareHouse\statusWareHouse;
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
        Schema::create('wareHouse', function (Blueprint $table) {
            $table->id();
            $table->string('id_product');
            $table->integer('quantity');
            $table->integer('status')->default(statusWareHouse::AVAILABLE);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wareHouse');
    }
};
