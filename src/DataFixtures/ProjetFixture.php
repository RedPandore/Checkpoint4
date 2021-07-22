<?php

namespace App\DataFixtures;

use App\Entity\Projet;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProjetFixture extends Fixture
{
    private const MAX_FIXTURES = 7;

    public function load(ObjectManager $manager)
    {
        $projet = new Projet();
        $projet->setName('Fiverr Helper');
        $projet->setUrl('https://github.com/RedPandore/Fiverr-Helper');
        $projet->setImage('Fiverr-Helper-60f925f9ab37a.png');
        $projet->setLanguage('Php | Twig | Scss | MySQL');
        $projet->setDescription('Il s\'agit d\'une Web App développée en 48h, pour le Hackathon Fiverr x Wild Code School. ');
        $manager->persist($projet);

        $projet = new Projet();
        $projet->setName('JobPermut');
        $projet->setUrl('https://github.com/WildCodeSchool/orleans-202103-php-project-jobpermut');
        $projet->setImage('Jobpermut-60f92dd633443.png');
        $projet->setLanguage('Php | Twig | Scss | MySQL');
        $projet->setDescription('Une Web App d\'échange d\'emploi développée dans le cadre de ma formation WildCodeSchool.');
        $manager->persist($projet);

        for ($i = 0; $i < self::MAX_FIXTURES; $i++) {
            $projet = new Projet();
            $projet->setName('Projet' . $i);
            $projet->setUrl('https://github.com/RedPandore');
            $projet->setImage('code_3.jpg');
            $projet->setLanguage('Php');
            $projet->setDescription('LoremEtiam sed consequat libero.
             Nunc vestibulum tortor eget libero volutpat molestiemagna. Nunc scelerisque rutrum massa, sed commodo arcu porttitor at. Aenean pellentesque posuere orci, quis dapibus orci. ');
            $manager->persist($projet);
        }
        $manager->flush();
    }
}
