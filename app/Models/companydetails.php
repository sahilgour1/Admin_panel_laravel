<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class companydetails extends Model
{
    //
    public $timestamps = false;
    protected $table = 'companydetails';
    
    use HasFactory;
    protected $fillable = [
        'companyname',
        'companytype',
        'companydate',
    ];
}
