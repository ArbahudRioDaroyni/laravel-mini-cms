<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleCategory extends Model
{
    // use HasFactory, SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'name', 
        'status', 
        'created_by', 
        'updated_by', 
        'deleted_by'
    ];

    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id');
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

