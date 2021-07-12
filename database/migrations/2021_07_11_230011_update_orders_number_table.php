<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class UpdateOrdersNumberTable.
 */
class UpdateOrdersNumberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('number');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('orders', function ($table) {
            $table->dropColumn('number');
        });
    }
}
