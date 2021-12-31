<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestStatus extends Model
{
    use HasFactory;
    protected $table = "RequestStatus";
    public $timestamps = false;
    protected $fillable = ["name"];

    public function scopeSearch($query, $search)
    {
        return $query
            ->where("name", "LIKE", "{$search}%");
    }
}
