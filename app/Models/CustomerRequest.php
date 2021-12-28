<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerRequest extends Model
{
    use HasFactory;
    protected $table = "CustomerRequest";
    public $timestamps = false;
    protected $fillable = ["request_date", "comment", "customer_id", "request_type_id", "request_status_id"];

    public function scopeSearch($query, $search)
    {
        return $query
            ->where("id", "LIKE", "%{$search}%");
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function request_type()
    {
        return $this->belongsTo(RequestType::class);
    }

    public function request_status()
    {
        return $this->belongsTo(RequestStatus::class);
    }
}
