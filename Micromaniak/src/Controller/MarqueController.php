<?php

namespace App\Controller;
use App\Entity\Marque;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class MarqueController extends AbstractController
{
   
    /**
     * @Route("/marque", name="app_marque")
     */
    public function index(Request $request): Response
    {
        $marque = new Marque();
        $repo = $this->getDoctrine()->getRepository(Marque::class);
        $marque=$repo->findAll();
    
        $marque2 = new Marque();
        $form = $this->createFormBuilder($marque2)
        ->add('nom',TextType::class)
        ->add('save', SubmitType::class, array('label'=>'Enregistrer',
        'attr'=>array('class'=>'btn')
           
        ))
        ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $marque = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($marque2);
            $entityManager->flush();

            $marque3 = new Etat();
        $repo = $this->getDoctrine()->getRepository(Etat::class);
        $marque3=$repo->findAll();
           
            return $this->render('marque/index.html.twig', [
                'controller_name' => 'MarqueController',
                'marque2' => $marque3,
                'form'=>$form->createView()
            ]);

           
        }
        return $this->render('marque/index.html.twig', [
            'controller_name' => 'MarqueController',
            'marque2' => $marque,
            'form'=>$form->createView()
        ]);
    }
    }

