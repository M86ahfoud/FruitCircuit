<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'message', 'note', 'user_id',  
    ];

   
    public function user () {
        
        return $this->belongsTo(user::class);
    }

 
    public function product () {

        return $this->belongsTo(Product::class);
    }
    

}
