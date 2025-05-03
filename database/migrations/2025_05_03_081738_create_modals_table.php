<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('modals', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->dateTime('display_from');
            $table->dateTime('display_to');
            $table->string('title');
            $table->string('title_display_colour')->nullable();
            $table->text('content');
            $table->timestamps();
        });
    }
};
