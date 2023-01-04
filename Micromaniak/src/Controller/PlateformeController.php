<?php

namespace App\Controller;

use App\Entity\Plateforme;
use App\Form\PlateformeType;
use App\Entity\Marque;

use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationExtension;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Forms;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;


class PlateformeController extends AbstractController
{
    /**
     * @Route("/plateforme", name="plateforme")
     */
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $plateforme = new Plateforme();
        
        $formPlateforme = $this->createForm(PlateformeType::class, $plateforme);

        $formPlateforme->handleRequest($request);
        if ($formPlateforme->isSubmitted() && $formPlateforme->isValid()) {
            die.dump($plateforme);
            $entityManager->$persist($plate56+orme);
            $entityManager->flush();
            return $this->redirectToRoute('plateforme');
        }

        $repos = $this->getDoctrine()->getRepository(Plateforme::class);
        $LesPlateformes = $repos->findAll();       

        return $this->render('plateforme/index.html.twig', [
            'controller_name' => 'PlateformeController',
            'formPlateforme' => $formPlateforme->createView(),
            'LesPlateformes'=> $LesPlateformes,
        ]);
    }
}
