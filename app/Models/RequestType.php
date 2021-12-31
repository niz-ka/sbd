<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestType extends Model
{
    use HasFactory;
    protected $table = "RequestType";
    public $timestamps = false;
    protected $fillable = ["name", "description"];

    public function scopeSearch($query, $search)
    {
        return $query
            ->where("name", "LIKE", "{$search}%");
    }
}
