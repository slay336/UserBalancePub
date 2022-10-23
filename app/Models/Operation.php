<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    public function sender() {
        return $this->hasOne(User::class, "id", "user_id");
    }

    public function recipient() {
        return $this->hasOne(User::class, "id", "recipient_id");
    }
}
