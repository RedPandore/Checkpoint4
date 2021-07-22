<?php

namespace App\DataFixtures;

use App\Entity\Competence;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CompetenceFixtures extends Fixture
{
    private const MAX_FIXTURES = 10;

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < self::MAX_FIXTURES; $i++) {
            $competence = new Competence();
            $competence->setNom('competence' . $i);
            $competence->setLogo('fas fa-blog');
            $competence->setOther(false);
            $manager->persist($competence);
        }
        for ($i = 0; $i < self::MAX_FIXTURES; $i++) {
            $competence = new Competence();
            $competence->setNom('Autrecompetence' . $i);
            $competence->setLogo('fas fa-blog');
            $competence->setOther(true);
            $manager->persist($competence);
        }
        $manager->flush();
    }
}
