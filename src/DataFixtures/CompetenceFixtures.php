<?php

namespace App\DataFixtures;

use App\Entity\Competence;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CompetenceFixtures extends Fixture
{
    private const MAX_FIXTURES = 10;
/*
html, css, scss, bootstrap, Php, symfony, mySQL, wordpress

Impression 3d, élèctronique, jardinnage*/

    private const Badges = [
        'php' =>  [
            'language' => 'php',
            'logo' => 'fab fa-php',
            'other' => false
        ],
        'html' =>  [
            'language' => 'html',
            'logo' => 'fab fa-html5',
            'other' => false
        ],
        'css' =>  [
            'language' => 'css3 | Sccs',
            'logo' => 'fab fa-css3-alt',
            'other' => false
        ],
        'bootstrap' =>  [
            'language' => 'bootstrap',
            'logo' => 'fab fa-bootstrap',
            'other' => false
        ],
        'symfony' =>  [
            'language' => 'symfony',
            'logo' => 'fab fa-symfony',
            'other' => false
        ],
        'mySQL' =>  [
            'language' => 'mySQL',
            'logo' => 'fas fa-database',
            'other' => false
        ],
        'wordpress' =>  [
            'language' => 'wordpress',
            'logo' => 'fab fa-wordpress',
            'other' => false
        ],
        'jardinnage' =>  [
            'language' => 'jardinnage',
            'logo' => 'fab fa-pagelines',
            'other' => true
        ],
        'élèctronique' =>  [
            'language' => 'electronique',
            'logo' => 'fas fa-car-battery',
            'other' => true
        ],
        'impression 3d' =>  [
            'language' => 'impression 3d',
            'logo' => 'fas fa-cubes',
            'other' => true
        ],
    ];


        
/*
html, css, scss, bootstrap, Php, symfony, mySQL, wordpress

Impression 3d, élèctronique, jardinnage*/

    public function load(ObjectManager $manager)
    {
        foreach (self::Badges as $badge) {
            $competence = new Competence();
            $competence->setNom($badge['language']);
            $competence->setLogo($badge['logo']);
            $competence->setOther($badge['other']);
            $manager->persist($competence);
        }
       
        $manager->flush();
    }
}
