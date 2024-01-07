<?php

namespace App\Controllers;

use App\Modules\BoardingPass\BoardingPass;
use App\Modules\BoardingPass\BoardingPassFactory;
use App\Modules\BoardingPass\BoardingPassSortingCommand;
use App\Modules\BoardingPass\Exceptions\InvalidTypeException;
use App\Modules\BoardingPass\Exceptions\NoStartingSourceFoundException;
use App\Modules\BoardingPass\OutputFormatter;
use App\Validators\BoardingPassRequestValidator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Simple controller service GET and POST requests
 */
class ApiController
{
    public function get(): JsonResponse
    {
        $data = [
            'message' => 'Boarding pass API',
        ];

        return new JsonResponse($data);
    }

    public function post(Request $request): JsonResponse
    {
        $validator = new BoardingPassRequestValidator();

        // Parse the input
        $data = json_decode($request->getContent(), true);

        if (!is_array($data)) {
            $response = [
                'error' => 'Invalid JSON data in the POST request. Expected an array of objects.',
            ];

            return new JsonResponse($response, Response::HTTP_BAD_REQUEST);
        }

        $validationResult = $validator->validate($data);

        if ($validationResult !== null) {
            return new JsonResponse([
                'errors' => $validationResult
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            /** @var BoardingPass[] $boardingPassCollection */
            $boardingPassCollection = array_map(function ($row) {
                return BoardingPassFactory::fromArray($row);
            }, $data);

            $boardingPassSortingService = new BoardingPassSortingCommand($boardingPassCollection);
            $sortedBoardingPasses = $boardingPassSortingService->sort()->getSorted();

        } catch (InvalidTypeException | NoStartingSourceFoundException $e) {
            return new JsonResponse([
                'errors' => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }

        $outputFormatter = new OutputFormatter($sortedBoardingPasses);

        return new JsonResponse($outputFormatter->format(), Response::HTTP_OK);
    }
}