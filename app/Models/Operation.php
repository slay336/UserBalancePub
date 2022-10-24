<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id", "recipient_id", "op_sum", "description"
    ];

    public function sender() {
        return $this->hasOne(User::class, "id", "user_id");
    }

    public function recipient() {
        return $this->hasOne(User::class, "id", "recipient_id");
    }
}
