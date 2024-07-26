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
		Schema::create('article_categories', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('slug')->nullable(); // new
			$table->boolean('status')->default(true)->nullable();
			$table->timestamps();
			$table->softDeletes();
			
			$table->unsignedBigInteger('created_by')->nullable();
			$table->unsignedBigInteger('updated_by')->nullable();
			$table->unsignedBigInteger('deleted_by')->nullable();

			$table->foreign('created_by')
			->references('id')
			->on('users')
			->onDelete('set null');

			$table->foreign('updated_by')
			->references('id')
			->on('users')
			->onDelete('set null');

			$table->foreign('deleted_by')
			->references('id')
			->on('users')
			->onDelete('set null');
		});

		Schema::create('articles', function (Blueprint $table) {
			$table->id();
			$table->string('title')->nullable();
			$table->string('subtitle', 100)->nullable(); // new
			$table->string('slug')->nullable(); // new
			$table->longText('body');
			$table->string('url')->nullable();
			$table->string('image')->nullable();
			$table->boolean('status')->default(true)->nullable();
			$table->unsignedBigInteger('category_id')->nullable();
			$table->timestamps();
			$table->softDeletes();

			$table->unsignedBigInteger('created_by')->nullable();
			$table->unsignedBigInteger('updated_by')->nullable();
			$table->unsignedBigInteger('deleted_by')->nullable();

			$table->foreign('category_id')
			->references('id')
			->on('article_categories')
			->onDelete('cascade');

			$table->foreign('created_by')
			->references('id')
			->on('users')
			->onDelete('set null');

			$table->foreign('updated_by')
			->references('id')
			->on('users')
			->onDelete('set null');

			$table->foreign('deleted_by')
			->references('id')
			->on('users')
			->onDelete('set null');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
			Schema::dropIfExists('articles');
			Schema::dropIfExists('article_categories');
	}
};
