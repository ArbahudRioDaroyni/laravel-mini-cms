<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingSlider extends Model
{
	use HasFactory;

	protected $table = 'setting_slider';
	protected $primaryKey = 'id';
	protected $guarded = [];

	protected $fillable = [
		'headline', 
		'slug', 
		'body', 
		'image', 
		'text-left-cta',
		'url-left-cta',
		'text-right-cta',
		'url-right-cta',
		'position',
		'status', 
		'created_by', 
		'updated_by', 
		'deleted_by'
	];

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
