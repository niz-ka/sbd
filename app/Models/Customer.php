<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = "Customer";
    public $timestamps = false;
    protected $fillable = ["full_name", "phone", "email", "address_id", "NIP", "REGON", "company_name", "PESEL", "customer_kind"];

    public function scopeSearch($query, $search)
    {
        return $query
            ->where("full_name", "LIKE", "{$search}%");
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
