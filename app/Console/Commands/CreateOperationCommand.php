<?php

namespace App\Console\Commands;

use App\Jobs\CreateOperationJob;
use App\Models\User;
use Illuminate\Console\Command;

class CreateOperationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'operation:create {senderEmail} {recipientEmail} {sum} {description?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates an operation';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sum = (float)$this->argument("sum");
        $sender = User::query()->where("email", "=", $this->argument("senderEmail"))->first();
        $senderBalance = $sender->balance()->first();

        if($senderBalance->user_balance < $sum) {
            $this->error("Too few money on the account");
            return 0;
        }
        
        $recipient = User::query()->where("email", "=", $this->argument("recipientEmail"))->first();
        $recipientBalance = $recipient->balance()->first();

        dispatch(new CreateOperationJob($sender, $recipient, $sum, $this->argument("description")));

        $senderBalance->user_balance -= $sum;
        $recipientBalance->user_balance += $sum;

        $senderBalance->save();
        $recipientBalance->save();

        $this->info("Success!");
        return 0;
    }
}
