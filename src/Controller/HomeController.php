<?php

namespace App\Controller;

use App\Repository\CompetenceRepository;
use App\Repository\GithubRepository;
use App\Repository\ProjetRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(CompetenceRepository $competenceRepository, ProjetRepository $projetRepository): Response
    {
        $myData = [
            "avatar_url" => 'test',
            "login" => 'test',
            "html_url" => 'test',
            "public_repos" => '16',
            "public_gists" => '11',
        ];
        $client = HttpClient::create();
        $username = 'RedPandore';

       $url = 'https://api.github.com/users/' . $username;
        $response = $client->request(
            'GET',
            $url,
            [],
            [],
            ['HTTP_ACCEPT' => 'application/vnd.github.v3+json']
        );
        $myData = json_decode($response->getContent(), true);

        $repoUrl = $myData['repos_url'];
        $response = $client->request(
            'GET',
            $repoUrl,
            [],
            [],
            ['HTTP_ACCEPT' => 'application/vnd.github.v3+json']
        );
        $allRepo = json_decode($response->getContent(), true);

        $allCompetences = $competenceRepository->findAll();
     //$allRepo = [];
        $allProjet = $projetRepository->findAll();
        return $this->render('home/index.html.twig', [
            'username' => $username,
            'myData' => $myData,
            'competences' => $allCompetences,
            'projets' => $allProjet,
            'repos' => $allRepo,
        ]);
    }
}
