<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfficeProfiles extends Model
{
	use HasFactory, SoftDeletes;

	protected $table = 'office_profiles';
	protected $primaryKey = 'id';
	protected $guarded = [];

	protected $fillable = [
		'title',
		'subtitle',
		'address',
		'address_maps_embed',
		'open_date',
		'close_date',
		'email',
		'status',
		'created_by', 
		'updated_by', 
		'deleted_by'
	];

	protected $dates = ['deleted_at'];

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
