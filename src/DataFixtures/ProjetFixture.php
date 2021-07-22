<?php

namespace App\DataFixtures;

use App\Entity\Projet;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProjetFixture extends Fixture
{
    private const MAX_FIXTURES = 10;

    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i < self::MAX_FIXTURES; $i++) {
            $projet = new Projet();
            $projet->setName('Projet' . $i);
            $projet->setUrl('https://github.com/RedPandore');
            $projet->setImage('https://picsum.photos/600/300');
            $projet->setLanguage('Php');
            $projet->setDescription('LoremEtiam sed consequat libero.
             Nunc vestibulum tortor eget libero volutpat molestiemagna. Nunc scelerisque rutrum massa, sed commodo arcu porttitor at. Aenean pellentesque posuere orci, quis dapibus orci. ');
            $manager->persist($projet);
        }
        $manager->flush();
    }
}
