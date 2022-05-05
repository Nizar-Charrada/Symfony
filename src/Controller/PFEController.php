<?php

namespace App\Controller;

use App\Entity\PFE;
use App\Form\PFEType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PFEController extends AbstractController
{

    #[Route('/pfe/all', name: 'pfe.all')]
    public function showAll(ManagerRegistry $manager): Response
    {
        $repost = $manager->getRepository(PFE::class);
        $pfe = $repost->findAll();

        return $this->render('pfe/index.html.twig', [
            "pfe" => $pfe
        ]);
    }
    #[Route('/pfe/add', name: 'pfe.add')]
    public function addPfe(ManagerRegistry $doc, Request $request): Response
    {
        $manager = $doc->getManager();
        $pfe = new PFE();
        $form = $this->createForm(PFEType::class, $pfe);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $manager->persist($pfe);
            $manager->flush();
            return $this->redirectToRoute('pfe.all');
        }
        return $this->render(
            'pfe/add.html.twig',
            ['form' => $form->createView()]
        );
    }
}
