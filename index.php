<?php
require_once 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Controllers\ApiController;

$request = Request::createFromGlobals();
$response = new Response();

$controller = new ApiController();

// Simple router for single controller
$response = match ($request->getMethod()) {
    Request::METHOD_GET => $controller->get(),
    Request::METHOD_POST => $controller->post($request),
    default => new JsonResponse(["msg" => "Method not allowed"], Response::HTTP_METHOD_NOT_ALLOWED),
};

$response->send();