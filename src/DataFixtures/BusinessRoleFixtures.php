<?php

namespace App\DataFixtures;

use App\Entity\BusinessRole;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BusinessRoleFixtures extends Fixture
{
    private const BUSINESS_ROLE = [
        'Développeur',
        'Analyst',
        'Front-End',
        'Back-End',
        'Full-stack',
        'Analyst',
        'Data-scientist'
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::BUSINESS_ROLE as $name) {
            $role = new BusinessRole();
            $role->setBusinessRoleName($name);
            $manager->persist($role);
            $this->setReference('business_role_' . $name, $role);
        }
        $manager->flush();
    }
}
