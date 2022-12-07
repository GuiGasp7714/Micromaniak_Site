<?php

namespace App\Controller;
use App\Entity\Etat;
use App\Entity\Marque;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class EtatController extends AbstractController
{
    
    /**
     * @Route("/etat", name="app_etat")
     */
    public function index(Request $request): Response
    {
        $etat = new Etat();
        $repo = $this->getDoctrine()->getRepository(Etat::class);
        $etat=$repo->findAll();
    
        $etat2 = new Etat();
        $form = $this->createFormBuilder($etat2)
        ->add('libelle',TextType::class)
        ->add('save', SubmitType::class, array('label'=>'Enregistrer',
        'attr'=>array('class'=>'btn')
           
        ))
        ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $etat = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($etat2);
            $entityManager->flush();

            $etat3 = new Etat();
        $repo = $this->getDoctrine()->getRepository(Etat::class);
        $etat3=$repo->findAll();
           
            return $this->render('etat/index.html.twig', [
                'controller_name' => 'EtatController',
                'etat2' => $etat3,
                'form'=>$form->createView()
            ]);

           
        }
        return $this->render('etat/index.html.twig', [
            'controller_name' => 'EtatController',
            'etat2' => $etat,
            'form'=>$form->createView()
        ]);
    }
    public function indexMarque(Request $request):Response{
        
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

        return $this->render('etat/index.html.twig', [
            'controller_name' => 'EtatController',
            'marque2' => $marque3,
            'form'=>$form->createView()
        ]);

       
    }
    return $this->render('etat/index.html.twig', [
        'controller_name' => 'EtatController',
        'marque2' => $marque,
        'form'=>$form->createView()
    ]);
    }
}
