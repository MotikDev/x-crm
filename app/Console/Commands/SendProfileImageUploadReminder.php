<?php

namespace App\Console\Commands;

use App\Models\Client;
use App\Notifications\UploadProfileImageNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendProfileImageUploadReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:upload-profile-image';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a reminder to clients to upload their profile image.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $clients = Client::whereNull('profile_image')->get();

        foreach ($clients as $client) {
            $lastNotification = $client->notifications()
                ->where('type', UploadProfileImageNotification::class)
                ->orderBy('created_at', 'desc')
                ->first();

                // logger(["LAST NOTIFICATION IS: ", $lastNotification]);

            // Check if the last notification was sent more than 3 days ago
            if (!$lastNotification || $lastNotification->created_at->diffInDays(Carbon::now()) >= 3) {
                $client->notify(new UploadProfileImageNotification());
            }
            // break;
        }
    }
}
