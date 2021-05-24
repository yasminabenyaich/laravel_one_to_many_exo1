<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $table ="photos";
    
    protected $filliable =[
        'id',
        'nom',
        'lien',
        'categorie',
        'role id'
    ];
    public function album(){
        return $this->belongsTo(Album::class);
    }
}
