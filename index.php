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
switch ($request->getMethod()) {
    case Request::METHOD_GET: $response = $controller->get(); break;

    // This method will handle the whole task logic, ideally there should be a separate controller for that
    case Request::METHOD_POST: $response = $controller->post($request); break;
    default: $response =  new JsonResponse(["msg" => "Method not allowed"], Response::HTTP_METHOD_NOT_ALLOWED);
}

$response->send();