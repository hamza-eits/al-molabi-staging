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
        Schema::create('umrah_invoice_masters', function (Blueprint $table) {
            $table->id();
            $table->date('issue_date')->nullable();
            $table->string('client_name')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('sub_agent')->nullable();
            $table->string('package_name')->nullable();
            $table->string('email')->nullable();
            
            $table->string('dep_flight_no')->nullable();
            $table->string('dep_sector')->nullable();
            $table->date('dep_date')->nullable();
            $table->time('dep_time')->nullable();
            $table->date('dep_arr_date')->nullable();
            $table->time('dep_arr_time')->nullable();
            
            $table->string('ret_flight_no')->nullable();
            $table->string('ret_sector')->nullable();
            $table->date('ret_date')->nullable();
            $table->time('ret_dep_time')->nullable();
            $table->date('ret_arr_date')->nullable();
            $table->time('ret_arr_time')->nullable();
            
            $table->decimal('sale_rate',15,2)->nullable();
            $table->decimal('sale_cur',15,2)->nullable();
            $table->decimal('ticket_cur',15,2)->nullable();
            $table->decimal('purchase_rate',15,2)->nullable();
            $table->decimal('purchase_cur',15,2)->nullable();
            $table->integer('flight_nights')->nullable();
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
        Schema::dropIfExists('umrah_invoice_masters');
    }
};
