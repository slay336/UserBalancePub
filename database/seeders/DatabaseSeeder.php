<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Balance;
use App\Models\Operation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $sender = User::factory()->create();
        $recipient = User::factory()->create();

        Balance::factory()->create([
            "user_id" => $sender->id
        ]);
        Balance::factory()->create([
            "user_id" => $recipient->id
        ]);

        Operation::factory(5)->create([
            "user_id" => $sender->id,
            "recipient_id" => $recipient->id,
            "description" => file_get_contents('http://loripsum.net/api')
        ]);
        Operation::factory(12)->create([
            "user_id" => $recipient->id,
            "recipient_id" => $sender->id,
            "description" => file_get_contents('http://loripsum.net/api')
        ]);
    }
}
