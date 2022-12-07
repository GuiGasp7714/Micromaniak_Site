<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Plateforme;
use App\Entity\Marque;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationExtension;
use Symfony\Component\HttpFoundation\Request;

class PlateformeController extends AbstractController
{
    /**
     * @Route("/plateforme", name="plateforme")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $repos = $this->getDoctrine()->getRepository(Plateforme::class);
        $LesPlateformes = $repos->findAll();       

        return $this->render('plateforme/index.html.twig', [
            'controller_name' => 'PlateformeController',
            'LesPlateformes'=> $LesPlateformes,
        ]);
    }
}
