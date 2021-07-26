<?php

namespace App\Controller;

use App\Repository\CompetenceRepository;
use App\Repository\InformationRepository;
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
    public function index(CompetenceRepository $competenceRepository, ProjetRepository $projetRepository, InformationRepository $informationRepository): Response
    {
        $myData = [
            "avatar_url" => 'test',
            "login" => 'test',
            "html_url" => 'test',
            "public_repos" => '16',
            "public_gists" => '11',
            "name" => 'Tennessee Houry'
        ];
        $allRepo = [];
        $client = HttpClient::create();
        $username = 'RedPandore';

        /* $url = 'https://api.github.com/users/' . $username;
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
        $allRepo = json_decode($response->getContent(), true);*/

        $allCompetences = $competenceRepository->findAll();

        //get all information entity
        $information = $informationRepository->findAll();

        // tri $information en fonction de leur dernier mise à jour
        usort($information, function ($a, $b) {
            return strcmp($b->getUpdatedAt()->format('Y-m-d H:i:s'), $a->getUpdatedAt()->format('Y-m-d H:i:s'));
        });

        // recupere le nom de curriculum
        $description = $information[0]->getDescription();

        $allProjet = $projetRepository->findAll();

        return $this->render('home/index.html.twig', [
            'username' => $username,
            'description' => $description,
            'myData' => $myData,
            'competences' => $allCompetences,
            'projets' => $allProjet,
            'repos' => $allRepo,
        ]);
    }
}
