<?php

namespace App\Jobs;

use App\EmailStatus;
use App\Models\Email;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;

    /**
     * Створити новий Job.
     *
     * @param  Email  $email
     */
    public function __construct(Email $email)
    {
        $this->email = $email;
    }

    /**
     * Виконати завдання.
     *
     * @return void
     */
    public function handle(): void
    {
        try {
            Mail::raw($this->email->message, function ($message) {
                $message->to($this->email->email_address)
                    ->subject('Your Email Notification');

                if ($this->email->attachment && $this->email->attachment_filename) {
                    $message->attach(storage_path('app/public/' . $this->email->attachment), [
                        'as' => $this->email->attachment_filename,
                    ]);
                }
            });

            $this->email->update(['status' => EmailStatus::SENT]);
        } catch (\Exception $e) {
            $this->email->update(['status' => EmailStatus::FAILED]);
        }
    }
}
