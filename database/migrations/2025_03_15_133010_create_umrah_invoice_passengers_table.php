<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umrah_invoice_passengers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('umrah_invoice_master_id')->nullable();
            $table->string('pnr')->nullable();
            $table->string('visa_no')->nullable();
            $table->date('visa_date')->nullable();
            $table->integer('visa_days')->nullable();
            $table->string('passenger_name')->nullable();
            $table->string('passport_no')->nullable();
            $table->string('type')->nullable();
            $table->string('gender')->nullable();
            $table->string('relation_type')->nullable();
            $table->string('shirka_name')->nullable();
            $table->decimal('visa_sale', 15,2)->nullable();
            $table->decimal('ticket_sale', 15,2)->nullable();
            $table->decimal('visa_purchase', 15,2)->nullable();
            $table->decimal('ticket_purchase', 15,2)->nullable();
            $table->decimal('forex_purchase', 15,2)->nullable();
            $table->decimal('forex_sale', 15,2)->nullable();

            // Foreign key constraint
            $table->foreign('umrah_invoice_master_id')->references('id')->on('umrah_invoice_masters')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('umrah_invoice_passengers');
    }
};
