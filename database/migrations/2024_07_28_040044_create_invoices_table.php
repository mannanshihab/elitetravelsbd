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
            $table->integer('customer_id');
            $table->integer('agent_id');
            $table->string('date_of_birth');
            $table->string('passport_no');
            $table->string('web_fIle_no');
            $table->string('token_no');
            $table->string('member_id');
            $table->string('work_type');
            $table->string('rcv_date');
            $table->string('delivery_date');
            $table->string('status');
            $table->integer('amount');
            $table->integer('qty');
            $table->integer('total_amount');
            $table->integer('costing');
            $table->integer('visa_fee');
            $table->integer('service_charge');
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
