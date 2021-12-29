<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $table = "Loan";
    public $timestamps = false;
    protected $fillable = ["purpose", "amount", "end_date", "start_date", "interest_rate", "account_id"];

    public function scopeSearch($query, $search)
    {
        return $query
            ->where("id", "LIKE", "%{$search}%");
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
