<?php

namespace App\Controller;

use App\Repository\CartaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{

    public function index(CartaRepository $cartrep): Response
    {
        $carta = $cartrep->findOneBy(['activa'=>true ],['id'=>'DESC']);
        return $this->render('main/index.html.twig', [
            'carta' => $carta,
        ]);
    }
}
