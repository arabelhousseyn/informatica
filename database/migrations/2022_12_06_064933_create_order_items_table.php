<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('order_id');
            $table->foreign('order_id')
                ->on('orders')
                ->references('id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->uuid('product_id')->nullable();
            $table->foreign('product_id')
                ->on('products')
                ->references('id')
                ->cascadeOnUpdate();

            $table->string('name');
            $table->text('description');
            $table->integer('quantity')->default(1);
            $table->decimal('price', 10, 2);

            $table->unique(['order_id', 'product_id']);
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
        Schema::dropIfExists('order_items');
    }
};
