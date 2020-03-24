<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Model\SampleModel;

class SampleController
{
    private $sampleModel;

    public function __construct(SampleModel $sampleModel)
    {
        $this->sampleModel = $sampleModel;
    }

    public function __invoke(Request $request, Response $response, $args): Response
    {
        $greeting = $this->sampleModel->getGreetings();
        return view($response, 'greeting.twig', ['greeting' => $greeting]);
    }
}
