<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Services\Example\ExampleService;

#[Route("/example")]
class ExampleController extends AbstractController
{
    public function __construct(private ExampleService $service) {}

    #[Route("/index")]
    public function index(): Response
    {
        return new JsonResponse($this->service->getData());
    }
}
