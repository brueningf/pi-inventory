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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('marking_code', 255);
            $table->decimal('price')->default(0.00);
            $table->smallInteger('sorting')->unsigned()->default(0);
            $table->decimal('weight')->default(0.000);
            $table->boolean('valid')->default(false);
            $table->foreignIdFor(\App\Models\Manufacturer::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
