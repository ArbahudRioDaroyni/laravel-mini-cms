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
		Schema::create('top_menus', function (Blueprint $table) {
			$table->id();
			$table->string('menu');
			$table->string('menu_parent')->nullable();
			$table->string('url')->nullable();
			$table->integer('position')->nullable();
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
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
			Schema::dropIfExists('top_menus');
	}
};
