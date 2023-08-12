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
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            $table->string('store_code')->default("reference");
            $table->string('mobile_number')->nullable();
            $table->string('name')->nullable();
            $table->text('address')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->text('notes')->nullable();
            $table->json('items');
            $table->double('subtotal')->nullable();
            $table->double('tax')->nullable();
            $table->double('delivery_fee')->nullable();;
            $table->double('grand_total')->nullable();;
            $table->string('promotion_code')->nullable();
            $table->json('free_items')->nullable();
            $table->double('delivery_surcharge')->nullable();;
            $table->json('promotion_items')->nullable();
            $table->foreignId('user_id')
                ->constrained(table: 'users', indexName: 'cart_user')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
