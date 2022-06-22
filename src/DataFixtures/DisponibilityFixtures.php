<?php

namespace App\DataFixtures;

use App\Entity\Disponibility;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DisponibilityFixtures extends Fixture
{
    private const DISP = [
        'Now',
        'One month',
        'Three month',
        'After three month'
    ];
    /**
     * @TODO add reference
     */
    public function load(ObjectManager $manager)
    {
        foreach (self::DISP as $value) {
            $disp = new Disponibility();
            $disp->setDisponibility($value);
            $manager->persist($disp);
            $this->addReference('disponibility_' . $value, $disp);
        }
        $manager->flush();
    }
}
