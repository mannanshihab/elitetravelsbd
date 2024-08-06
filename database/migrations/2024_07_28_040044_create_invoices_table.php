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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice');
            $table->integer('user_id');
            $table->string('work_type');
            $table->integer('customer_id');
            $table->integer('agent_id');
            $table->integer('vendor_id');
            $table->string('web_file_no')->nullable();
            $table->string('token_no')->nullable();
            $table->string('appointment_date')->nullable();
            $table->string('rcv_date')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('ticket_no')->nullable();
            $table->string('pnr_no')->nullable();
            $table->string('going');
            $table->string('status');
            $table->integer('our_amount');
            $table->integer('received_amount');
            $table->integer('costing')->nullable();
            $table->integer('agent_amount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
