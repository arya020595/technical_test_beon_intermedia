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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('occupant_id');
            $table->unsignedBigInteger('house_id');
            $table->unsignedBigInteger('dues_type_id');
            $table->date('billing_start_date');
            $table->date('billing_end_date');
            $table->date('payment_date');
            $table->decimal('payment_amount', 10, 2);
            $table->string('payment_proof_url');
            $table->boolean('is_paid');
            $table->timestamps();

            $table->foreign('occupant_id')->references('id')->on('occupants')->onDelete('cascade');
            $table->foreign('house_id')->references('id')->on('houses')->onDelete('cascade');
            $table->foreign('dues_type_id')->references('id')->on('dues_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
