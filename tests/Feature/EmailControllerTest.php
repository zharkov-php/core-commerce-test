<?php

namespace Tests\Feature;

use App\Models\Email;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmailControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_submit_email_validation_fails(): void
    {
        $response = $this->postJson('/api/emails', [
            'email_address' => 'invalid-email',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['email_address', 'message']);
    }

    public function test_submit_email_creates_record()
    {
        $data = [
            'email_address' => 'test@example.com',
            'message' => 'This is a test email.',
            'attachment' => base64_encode('test content'),
            'attachment_filename' => 'test.txt',
        ];

        $response = $this->postJson('/api/emails', $data);

        $response->assertStatus(201)
            ->assertJsonStructure(['message', 'data' => ['id', 'email_address', 'message']]);

        $this->assertDatabaseHas('emails', [
            'email_address' => $data['email_address'],
            'message' => $data['message'],
        ]);
    }

    public function test_submit_email_returns_correct_response(): void
    {
        $data = [
            'email_address' => 'test@example.com',
            'message' => 'This is a test email.',
        ];

        $response = $this->postJson('/api/emails', $data);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'message',
                'data' => [
                    'id',
                    'email_address',
                    'message',
                    'status',
                    'created_at',
                    'updated_at',
                ],
            ]);
    }

    public function test_list_emails_returns_records()
    {
        Email::factory()->count(3)->create();

        $response = $this->getJson('/api/emails');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'data' => [
                    '*' => [
                        'id',
                        'email_address',
                        'message',
                        'status',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);
    }
}
