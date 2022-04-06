<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalanderController extends AbstractController
{
    /**
     * @Route("/calander", name="app_calander")
     */
    public function index(): Response
    {
        return $this->render('calander/index.html.twig', [
            'controller_name' => 'CalanderController',
        ]);
    }
}
