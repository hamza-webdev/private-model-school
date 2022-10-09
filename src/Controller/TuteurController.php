<?php

namespace App\Controller;

use App\Entity\Tuteur;
use App\Form\TuteurType;
use App\Repository\TuteurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/tuteur')]
class TuteurController extends AbstractController
{
    /**
     * display all parents of students
     * @param  \App\Repository\TuteurRepository           $tuteurRepository
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @author Hamza
     * @version 1.0
     */
    #[Route('/', name: 'tuteur_index', methods: ['GET'])]
    public function index(TuteurRepository $tuteurRepository): Response
    {
        return $this->render('tuteur/index.html.twig', [
            'tuteurs' => $tuteurRepository->findAll(),
        ]);
    }

/**
 * Create new parents
 * @param  \Symfony\Component\HttpFoundation\Request  $request
 * @param  \Doctrine\ORM\EntityManagerInterface       $entityManager
 *
 * @return \Symfony\Component\HttpFoundation\Response
 * @author Hamza
 * @version 1.0
 */
    #[Route('/new', name: 'tuteur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $tuteur = new Tuteur();
        $form = $this->createForm(TuteurType::class, $tuteur);
        $form->handleRequest($request);
// dd($tuteur);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($tuteur);
            $entityManager->flush();

            return $this->redirectToRoute('tuteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tuteur/new.html.twig', [
            // 'tuteur' => $tuteur,
            'form' => $form,
        ]);
    }

     /**
     *
     * @param  \App\Entity\Tuteur                         $tuteur
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @author Hamza
     * @version 1.0
     */
    #[Route('/{id}', name: 'tuteur_show', methods: ['GET'])]
    public function show(Tuteur $tuteur): Response
    {
        return $this->render('tuteur/show.html.twig', [
            'tuteur' => $tuteur,
        ]);
    }

    #[Route('/{id}/edit', name: 'tuteur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Tuteur $tuteur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TuteurType::class, $tuteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('tuteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tuteur/edit.html.twig', [
            'tuteur' => $tuteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'tuteur_delete', methods: ['POST'])]
    public function delete(Request $request, Tuteur $tuteur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tuteur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($tuteur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tuteur_index', [], Response::HTTP_SEE_OTHER);
    }
}
