<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = "Address";
    public $timestamps = false;
    protected $fillable = ["street", "number", "apartment", "city", "postal_code"];

    public function scopeSearch($query, $search)
    {
        return $query
            ->where("street", "LIKE", "%{$search}%")
            ->orWhere("number", "LIKE", "%{$search}%")
            ->orWhere("apartment", "LIKE", "%{$search}%")
            ->orWhere("city", "LIKE", "%{$search}%")
            ->orWhere("postal_code", "LIKE", "%{$search}%");
    }
}
