<?php

namespace App\Controller;

use App\Repository\CompetenceRepository;
use App\Repository\GithubRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpClient\HttpClient;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(CompetenceRepository $competenceRepository): Response
    {
        $myData = [
            "avatar_url" => 'test',
            "login" => 'test',
            "html_url" => 'test',
            "public_repos" => 'test',
            "public_gists" => 'test',
        ];
        $client = HttpClient::create();
        $username = 'RedPandore';
        // find username url in github api
        $url = 'https://api.github.com/users/' . $username;
       /* $response = $client->request(
            'GET',
            $url,
            [],
            [],
            ['HTTP_ACCEPT' => 'application/vnd.github.v3+json']
 );
        $data = json_decode($response->getContent(), true);
        $Mydata = $data*/


        $allCompetences = $competenceRepository->findAll();
        return $this->render('home/index.html.twig', [
            'competences' => $allCompetences,
            'username' => $username,
            'myData' => $myData,
        ]);
    }
}
