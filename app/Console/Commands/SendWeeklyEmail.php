<?php

namespace App\Console\Commands;

use App\Mail\DefaultMail;
use App\Models\User;
use Illuminate\Console\Command;
use Mail;

class SendWeeklyEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-weekly-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();

        Mail::to($users)->send(new DefaultMail(
            [
                'title' => 'Weekly email',
                'body' => 'This is the weekly email content.'
            ]
        ));
    }
}
