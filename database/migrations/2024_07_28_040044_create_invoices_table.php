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
            $table->string('date_of_birth');
            $table->string('passport_no');
            $table->string('web_file_no');
            $table->string('member_id');
            $table->string('token_no');
            $table->string('rcv_date');
            $table->string('delivery_date');
            $table->string('ticket_no');
            $table->string('package_name');
            $table->string('pnr_no');
            $table->string('status');
            $table->integer('main_amount');
            $table->integer('recive_amount');
            $table->integer('costing');
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
