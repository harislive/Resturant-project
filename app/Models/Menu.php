<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['name','image','price','description'];
    
    public function Categorys()
    {
      return  $this->belongsToMany(category::class,'category_menus');
    }
}
