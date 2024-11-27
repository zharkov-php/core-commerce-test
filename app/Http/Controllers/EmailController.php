<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitEmailRequest;
use App\Http\Resources\EmailResource;
use App\Repositories\EmailRepository;
use App\Services\EmailService;
use App\Services\FileService;
use Illuminate\Http\JsonResponse;

class EmailController extends Controller
{
    protected FileService $fileService;
    protected EmailService $emailService;
    protected EmailRepository $emailRepository;

    public function __construct(FileService $fileService, EmailService $emailService, EmailRepository $emailRepository)
    {
        $this->fileService = $fileService;
        $this->emailService = $emailService;
        $this->emailRepository = $emailRepository;
    }

    public function submitEmail(SubmitEmailRequest $request): JsonResponse
    {
        $validated = $request->validated();

        if (!empty($validated['attachment']) && !empty($validated['attachment_filename'])) {
            $validated['attachment'] = $this->fileService->saveBase64File(
                $validated['attachment'],
                $validated['attachment_filename']
            );
        }

        $email = $this->emailService->createAndQueueEmail($validated);

        return response()->json([
            'message' => 'Email submitted successfully.',
            'data' => new EmailResource($email),
        ], 201);
    }

    public function listEmails(): JsonResponse
    {
        $emails = $this->emailRepository->getAll();

        return response()->json([
            'message' => 'Emails retrieved successfully.',
            'data' => EmailResource::collection($emails),
        ]);
    }
}
