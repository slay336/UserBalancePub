<?php

namespace Database\Factories;

use App\Models\Operation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OperationFactory extends Factory
{
    protected $model = Operation::class;
    
    public function definition()
    {        
        return [
            "op_sum" => $this->faker->randomFloat(2)
        ];
    }
}
