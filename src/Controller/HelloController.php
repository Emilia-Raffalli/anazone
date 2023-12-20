<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    #[Route('/hello/{firstname<^[a-zA-Z\-À-ù]{3,}+$>}', name: 'app_hello')] //chemin 
    public function index(string $firstname): Response
    {
        return $this->render('hello/index.html.twig', [
            'name' => $firstname,
        ]);
    }
}


