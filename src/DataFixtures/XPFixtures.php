<?php

namespace App\DataFixtures;

use App\Entity\Experience;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class XPFixtures extends Fixture
{
    private const XP = [
        'Less than one years',
        'One years',
        'Three years',
        'Five years',
        'More than five years',
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::XP as $name) {
            $xpCand = new Experience();
            $xpCand->setName($name);
            $manager->persist($xpCand);
            $this->addReference('name_' . $name, $xpCand);
        }
        $manager->flush();
    }
}
