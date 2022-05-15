<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
    ];
    
    public function scopeFilter($query)
    {
        if(request("search")) {

            $query 
            ->where('name', 'like', '%' . request("search") . '%')->get(); 
        }
    }
   
   public function  products() 
   {
       return $this->hasMany(Product::class);
   }
   public function links()
   {
    return $this->hasMany(Link::class)->paginate(10);
   }
}
