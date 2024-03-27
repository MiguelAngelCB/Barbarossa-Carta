<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=['name','slug','position','description'];

    public function dishes(){
        return $this->hasMany(Dish::class);
    }

    public function getRouteKeyName()
    {
        return "slug";
    }
}
