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
        Schema::create('lt_tickets', function (Blueprint $table) {
            $table->id();
            $table->text('subject');
            $table->text('description');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('assigned_to')->nullable();
            $table->unsignedInteger('lt_type_id')->default(1);
            $table->unsignedInteger('lt_state_id')->default(1);
            $table->text('referrer')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lt_tickets');
    }
};
