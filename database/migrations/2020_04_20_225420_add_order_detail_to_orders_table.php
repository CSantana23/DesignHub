<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderDetailToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('order_qty');
            $table->float('grand_total');
            $table->float('unit_price');
            $table->string('purchase_id');
            $table->boolean('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('order_qty');
            $table->dropColumn('grand_total');
            $table->dropColumn('unit_price');
            $table->dropColumn('purchase_id');
            $table->dropColumn('status');
        });
    }
}
