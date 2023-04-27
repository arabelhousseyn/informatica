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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->index();
            $table->text('description');

            $table->uuid('admin_id');
            $table->foreign('admin_id')
                ->on('admins')
                ->references('id')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->uuid('category_id')->nullable();
            $table->foreign('category_id')
                ->on('categories')
                ->references('id')
                ->cascadeOnUpdate();

            $table->decimal('price', 10, 2);
            $table->decimal('old_price', 10, 2)->nullable();
            $table->timestamp('published_at');
            $table->integer('discount')->default(0);
            $table->string('status');
            $table->boolean('can_be_banner')->default(false);

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
        Schema::dropIfExists('products');
    }
};
