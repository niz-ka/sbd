<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    use HasFactory;
    protected $table = "AccountType";
    public $timestamps = false;
    protected $fillable = ["name", "symbol", "description"];

    public function scopeSearch($query, $search)
    {
        return $query
            ->where("name", "LIKE", "%{$search}%")
            ->orWhere("description", "LIKE", "%{$search}%")
            ->orWhere("symbol", "LIKE", "%{$search}%");
    }
}
