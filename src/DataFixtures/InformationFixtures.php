<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Information;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class InformationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $information = new Information();
        $information->setCurriculum('Fixtures');
        $information->setDescription('Fixtures ');
        $information->setUpdatedAt(new \DateTime('06/04/2014'));
        $manager->persist($information);

        $manager->flush();
    }
}
