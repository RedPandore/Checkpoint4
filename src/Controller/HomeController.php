<?php

namespace App\Controller;

use App\Repository\GithubRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/accueil", name="home")
     */
    public function index(GithubRepository $githubRepository): Response
    {
        $allRepos = $githubRepository->findAll();
        $repoNames = array_map(function (\App\Entity\Github $repo) {
            return $repo->getRepoName();
        }, $allRepos);

        // get username from repoNames
        $user = array_unique(array_map(function ($repoName) {
            return substr($repoName, 0, strpos($repoName, '/'));
        }, $repoNames));

        return $this->render('home/index.html.twig', [
            'repoNames' => $repoNames,
            'allRepos' => $allRepos,
        ]);
    }
}
