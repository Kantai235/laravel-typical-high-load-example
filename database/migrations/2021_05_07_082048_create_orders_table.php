<?php

use App\Domains\Orders\Models\Orders;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateOrdersTable.
 */
class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid');
            $table->enum('type', [
                Orders::UNPAID,
                Orders::UNPAID_CANCEL,
                Orders::PAID,
                Orders::PAID_CANCEL_NO_REFUND,
                Orders::PAID_CANCEL_REFUND,
                Orders::PAID_INVOICE,
                Orders::PAID_INVOICE_CANCEL,
                Orders::PAID_INVOICE_CANCEL_REFUND,
                Orders::PAID_INVOICE_CANCEL_REFUND_REINVOICE,
                Orders::COMPLETED,
                Orders::COMPLETED_RETURN_WAITING,
                Orders::COMPLETED_CANCEL_RETURN,
                Orders::ACCEPT_RETURN,
                Orders::ACCEPT_RETURN_REFUND,
                Orders::ACCEPT_RETURN_REFUND_REINVOICE,
            ])->default(Orders::UNPAID)->comment('訂單狀態');
            $table->unsignedTinyInteger('active')->default(1)->comment('啟用狀態');
            $table->integer('price')->default(0)->comment('價格');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('price')->default(0)->comment('價格');
            $table->integer('count')->default(0)->comment('剩餘數量');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
    }
}
