<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mainsection extends Model
{
    use HasFactory;

    protected $table = 'mainsection';

    protected $fillable = [
        'id',
        'name',
        'description'   
    ];

    // public function mainSection()
    // {
    //     return $this->hasOne(Mainsection::class);
    // }


}
