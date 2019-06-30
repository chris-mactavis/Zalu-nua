<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('transaction_id');
            $table->decimal('cart_total', 9, 2);
            $table->decimal('discount', 9, 2);
            $table->decimal('order_total', 9, 2);
            $table->decimal('shipping_fee', 9, 2);
            $table->decimal('grand_total', 9, 2);
            $table->integer('customer_id');
            $table->enum('payment_method', ['paystack', 'bank transfer', 'paypal', 'stripe']);
            $table->enum('order_status', ['new', 'paid', 'delivered', 'cancelled']);
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
        Schema::dropIfExists('orders');
    }
}
