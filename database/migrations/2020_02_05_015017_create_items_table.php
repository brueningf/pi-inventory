<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('provider_code')->nullable();
            $table->string('marking_code')->nullable();
            $table->text('description')->nullable();
            $table->float('price')->default(0.00);
            $table->string('image')->nullable();
            $table->string('datasheet')->nullable();

            $table->unsignedInteger('category_id');
            $table->integer('manufacturer_id')->nullable();
            $table->unsignedInteger('item_case_id');

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
        Schema::dropIfExists('items');
    }
}
