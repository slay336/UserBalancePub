<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Balance;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class BalanceFactory extends Factory
{
    protected $model = Balance::class;

    public function definition()
    {
        return [
            "user_balance" => $this->faker->randomFloat(2)
        ];
    }
}
