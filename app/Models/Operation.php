<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    public function sender() {
        return $this->hasOne(User::class, "user_id");
    }

    public function recipient() {
        return $this->hasOne(User::class, "recipient_id");
    }
}
