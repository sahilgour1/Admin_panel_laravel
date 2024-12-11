<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class menu extends Model
{
    //
    public $timestamps = false;
    protected $table = 'menus';

    use HasFactory;
    protected $fillable = [
        'category',
        'permission',
    ];
}
