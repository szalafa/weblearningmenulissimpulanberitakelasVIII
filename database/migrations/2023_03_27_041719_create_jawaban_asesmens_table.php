<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jawaban_asesmens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('jawaban_asesmen_1')->nullable();
            $table->string('jawaban_asesmen_2')->nullable();
            $table->string('jawaban_asesmen_3')->nullable();
            $table->string('jawaban_asesmen_4')->nullable();
            $table->string('jawaban_asesmen_5')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_asesmens');
    }
};
