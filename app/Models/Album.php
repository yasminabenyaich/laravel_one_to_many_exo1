<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    
    protected $table ="albums";
    
    protected $filliable =[
        'id',
        'nom',
        'lien',
        'description'
    ];
    public function photos(){
        return $this->hasMany(Album::class);
    }
}
