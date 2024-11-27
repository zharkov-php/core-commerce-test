<?php

namespace Database\Factories;

use App\EmailStatus;
use App\Models\Email;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Email>
 */
class EmailFactory extends Factory
{
    protected $model = Email::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'email_address' => $this->faker->safeEmail(),
            'message' => $this->faker->paragraph(),
            'attachment' => null,
            'attachment_filename' => null,
            'status' => EmailStatus::PENDING,
        ];
    }
}
