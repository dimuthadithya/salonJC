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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone');
            $table->string('email');
            $table->integer('age')->nullable();
            $table->text('special_requirements')->nullable();

            // Service details
            $table->foreignId('service_category_id')->constrained('service_categories');
            $table->foreignId('service_id')->constrained('services');
            $table->json('addon_services')->nullable(); // Store IDs of additional services

            // Appointment details
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->foreignId('stylist_id')->nullable()->constrained('users');

            // Payment and status
            $table->decimal('base_price', 10, 2);
            $table->decimal('addons_price', 10, 2)->default(0);
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed'])->default('pending');
            $table->enum('payment_status', ['pending', 'paid', 'refunded'])->default('pending');
            $table->string('payment_method')->nullable();
            $table->string('transaction_id')->nullable();

            // Timestamps for tracking
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
