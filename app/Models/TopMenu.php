<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopMenu extends Model
{
    use HasFactory;

    protected $table = 'top_menus';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function parentMenu()
    {
        return $this->belongsTo(TopMenu::class, 'menu_parent');
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
