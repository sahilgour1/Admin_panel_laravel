<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class blog extends Model
{
    //
    public $timestamps = false;
    protected $table = 'blogs';
    
    use HasFactory;
    protected $fillable = [
        'title',
        'date',
        'email',
        'number',
        'authorname	',
        'category_for',
        'gender',
        'description',
    ];
}
