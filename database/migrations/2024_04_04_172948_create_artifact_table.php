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
        Schema::create('artifact', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->integer('inv_number');
            $table->date('date_arrival');
            $table->string('number_arrival');
            $table->integer('groups');
            $table->integer('department');
            $table->text('description');
            $table->text('history');
            $table->string('img');
            $table->string('model');
            $table->string('document');
            $table->string('place_found');
            $table->string('who_found');
            $table->string('receipt_document');
            $table->string('material');
            $table->string('technology');
            $table->string('size');
            $table->float('weight');
            $table->text('state');
            $table->text('storage_loc');
            $table->boolean('publish')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artifact');
    }
};
