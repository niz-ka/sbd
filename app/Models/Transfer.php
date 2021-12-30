<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;
    protected $table = "Transfer";
    public $timestamps = false;
    protected $fillable = ["receiver_number", "transfer_date", "amount", "title", "receiver_data", "transfer_type_id", "account_id"];

    public function scopeSearch($query, $search)
    {
        return $query
            ->where("name", "LIKE", "%{$search}%");
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function transfer_type()
    {
        return $this->belongsTo(TransferType::class);
    }
}
