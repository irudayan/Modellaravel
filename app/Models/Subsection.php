<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mainsection;

class Subsection extends Model
{
   
    use HasFactory;

    protected $table = 'subsections';

    protected $fillable = [
        'id',
        'subsectionname',
        'subdescription',
        'section_id'
    ];

    public function mainSection()
    {
        return $this->belongsto(Mainsection::class, 'section_id' );
    }

}
