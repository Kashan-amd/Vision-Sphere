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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();  // Auto-incrementing ID
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // Foreign key to the users table
            $table->string('address');  // Billing or shipping address
            $table->string('payment_method');  // Payment method (e.g., PayPal, Credit Card)
            $table->decimal('total_amount', 10, 2);  // Total order amount
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending');  // Order status
            $table->json('products');  // JSON column to store products and quantities
            $table->timestamps();  // Created and updated timestamps
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
