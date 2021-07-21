<?php

namespace App\Controller;

use App\Entity\Github;
use App\Form\GithubType;
use App\Repository\GithubRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/github")
 */
class GithubController extends AbstractController
{
    /**
     * @Route("/", name="github_index", methods={"GET"})
     */
    public function index(GithubRepository $githubRepository): Response
    {
        return $this->render('github/index.html.twig', [
            'githubs' => $githubRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="github_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $github = new Github();
        $form = $this->createForm(GithubType::class, $github);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($github);
            $entityManager->flush();

            return $this->redirectToRoute('github_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('github/new.html.twig', [
            'github' => $github,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="github_show", methods={"GET"})
     */
    public function show(Github $github): Response
    {
        return $this->render('github/show.html.twig', [
            'github' => $github,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="github_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Github $github): Response
    {
        $form = $this->createForm(GithubType::class, $github);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('github_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('github/edit.html.twig', [
            'github' => $github,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="github_delete", methods={"POST"})
     */
    public function delete(Request $request, Github $github): Response
    {
        if ($this->isCsrfTokenValid('delete'.$github->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($github);
            $entityManager->flush();
        }

        return $this->redirectToRoute('github_index', [], Response::HTTP_SEE_OTHER);
    }
}
