<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\Category;
class Product extends Model
{

    use HasFactory;

    protected $fillable = [
        'nom', 'description', 'prix', 'slug', 'coup_de_coeur', 'image', 'category_id', 'user_id', 'promotion'
    ];


    public function scopeFilter($query)

    {
        if(request("search")) {

            $query 
            ->where('description', 'like', '%' . request("search") . '%')

            ->orwhere('nom', 'like', '%' . request("search") . '%')
            ->orwhere('prix', 'like', '%' . request("search") . '%')->get(); 
        }
    }


    public function Category() 

    {
        return $this->belongsTo(Category::class); 
    }

    public function comments() {

        return $this->hasMany(comment::class)->latest();
    }
}
