<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
		// use HasFactory, SoftDeletes;
		use HasFactory;

		protected $table = 'articles';
		protected $primaryKey = 'id';
		protected $guarded = [];

		protected $fillable = [
			'title', 
			'subtitle', 
			'body', 
			'url', 
			'image', 
			'status', 
			'category_id', 
			'created_by', 
			'updated_by', 
			'deleted_by'
		];

		public function category()
		{
			return $this->belongsTo(ArticleCategory::class, 'category_id')->select('id', 'name');
		}
		
		public function createdBy()
		{
				return $this->belongsTo(User::class, 'created_by', 'id')->select('id', 'name');
		}
		public function updatedBy()
		{
				return $this->belongsTo(User::class, 'updated_by', 'id')->select('id', 'name');
		}
		public function deletedBy()
		{
				return $this->belongsTo(User::class, 'deleted_by', 'id')->select('id', 'name');
		}
}
