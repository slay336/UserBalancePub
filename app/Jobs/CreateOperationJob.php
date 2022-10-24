<?php

namespace App\Jobs;

use App\Models\Operation;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateOperationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $sender;
    protected $recipient;
    protected $sum;
    protected $description;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($sender, $recipient, $sum, $description)
    {
        $this->sender = $sender;
        $this->recipient = $recipient;
        $this->sum = $sum;
        $this->description = $description;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Operation::create([
            "user_id" => $this->sender->id,
            "recipient_id" => $this->recipient->id,
            "op_sum" => $this->sum,
            "description" => $this->desription ?? ""
        ]);
    }
}
