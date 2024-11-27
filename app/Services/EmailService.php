<?php

namespace App\Services;

use App\Jobs\SendEmailJob;
use App\Models\Email;
use App\Repositories\EmailRepository;

class EmailService
{
    protected EmailRepository $emailRepository;

    public function __construct(EmailRepository $emailRepository)
    {
        $this->emailRepository = $emailRepository;
    }

    public function createAndQueueEmail(array $data): Email
    {
        $email = $this->emailRepository->create($data);

        dispatch(new SendEmailJob($email));

        return $email;
    }
}
