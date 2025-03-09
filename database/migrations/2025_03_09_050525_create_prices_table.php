<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('type');
            $table->integer('price');
            $table->integer('duration');
            $table->boolean('is_membership_minimum')->default(false);
            $table->time('purchasable_from')->nullable();
            $table->time('purchasable_to')->nullable();
            $table->timestamps();
        });
    }
};
