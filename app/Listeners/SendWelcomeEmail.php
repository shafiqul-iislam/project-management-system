<?php

namespace App\Listeners;

use App\Models\Setting;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeEmail implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        $developer = $event->developer;

        // later i will use helper function to get smtp settings
        // Fetch SMTP settings from DB
        $smtp = [
            'transport' => Setting::get('mail_mailer'),
            'host' => Setting::get('mail_host'),
            'port' => Setting::get('mail_port'),
            'encryption' => Setting::get('mail_encryption'),
            'username' => Setting::get('mail_username'),
            'password' => Setting::get('mail_password'),
            'from' => [
                'address' => Setting::get('mail_from_address'),
                'name' => Setting::get('mail_from_name'),
            ],
        ];

        // Set mail config dynamically
        config(['mail.mailers.smtp' => $smtp]);
        config(['mail.from.address' => $smtp['from']['address']]);
        config(['mail.from.name' => $smtp['from']['name']]);

        // Send an email (example)
        Mail::raw('Welcome to our platform, ' . $developer->name, function ($message) use ($developer) {
            $message->to($developer->email)
                ->subject('Welcome Email');
        });
    }
}
