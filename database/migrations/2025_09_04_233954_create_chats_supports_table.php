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
        Schema::create('chats_supports', function (Blueprint $table) {
            $table->id();
            $table->text('mensaje');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('fecha_mensaje')->useCurrent();
            $table->boolean('atendido')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats_supports');
    }
};
