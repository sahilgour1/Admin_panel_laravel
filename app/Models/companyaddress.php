<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class companyaddress extends Model
{
    //
    public $timestamps = false;
    protected $table = 'companyaddress'; // Your table name

    public function getUserCompanyAddressData($companyId)
    {
        return $this->where('user_id', $companyId)->get(); // Adjust the query as needed
    }
    protected $fillable = [
        'user_id', 'address', 'latitude', 'longtude', 'mobile'
    ];
}
