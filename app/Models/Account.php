<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table = "Account";
    public $timestamps = false;
    protected $fillable = ["number", "name", "balance", "interest_rate", "opening_date", "account_type_id", "customer_id", "co_owner_id"];

    public function scopeSearch($query, $search)
    {
        return $query
            ->where("name", "LIKE", "%{$search}%");
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function co_owner()
    {
        return $this->belongsTo(Customer::class, "co_owner_id");
    }

    public function account_type()
    {
        return $this->belongsTo(AccountType::class);
    }
}
