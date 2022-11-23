<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MicromaniakController extends AbstractController
{
    /**
     * @Route("/", name="app_micromaniak")
     */
    public function index(): Response
    {
        return $this->render('micromaniak/index.html.twig', [
            'controller_name' => 'MicromaniakController',
        ]);
    }
}
