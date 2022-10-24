<?php

namespace App\Console\Commands;

use App\Models\Balance;
use App\Models\User;
use Illuminate\Console\Command;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {name} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::create([
            "name" => $this->argument("name"),
            "email" => $this->argument("email"),
            "password" => bcrypt($this->argument("password"))
        ]);

        Balance::create([
            "user_id" => $user->id,
            "user_balance" => 0.0
        ]);
        
        $this->info("User created!");
        return 0;
    }
}
