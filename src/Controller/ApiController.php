<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    /**
     * @Route("/api", name="api")
     */
    public function index(): Response
    {
        $data = file_get_contents('main/archivo.json',FILE_USE_INCLUDE_PATH);

        $response = new JsonResponse();
        $response->setData($data);


        $response->headers->set('Content-Type', 'application/json');
        return $response;

    }
}
