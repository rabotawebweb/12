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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->unsignedSmallInteger('year');
			$table->text('comment')->nullable();
			$table->text('image')->nullable();
			$table->unsignedBigInteger('author_id');
			$table->foreign('author_id')->references('id')->on('authors');
			$table->unsignedBigInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users');
			$table->json('catalogs')->nullable();
			$table->boolean('show')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
