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
		Schema::create('office_profiles', function (Blueprint $table) {
			$table->id();
			$table->string('slug', 100)->nullable();
			$table->string('title', 50);
			$table->string('subtitle', 100);
			$table->string('address');
			$table->text('address_maps_embed');
			$table->string('open_date');
			$table->string('close_date');
			$table->string('email', 100);
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
		Schema::dropIfExists('office_profiles');
	}
};