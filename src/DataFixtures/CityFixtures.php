<?php

namespace App\DataFixtures;

use App\Entity\City;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CityFixtures extends Fixture
{
    private const CITY = [
        'Angers',
        'Paris',
        'Bordeaux'
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::CITY as $value) {
            $city = new City();
            $city->setName($value);
            $this->addReference('city_' . $value, $city);
            $manager->persist($city);
        }
        $manager->flush();
    }
}
