<?php

namespace App\DataFixtures;

use App\Entity\Admin;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminFixtures extends Fixture
{
    private const ADMIN = [
        'admin' => [
            'John',
            'Doe',
            'azerty',
            'admin@gmail.com',
            '+33-0-00-00-00-00',
            'ROLE_ADMIN',
        ],
        'superAdmin' => [
            'François',
            'Mirande',
            'azerty',
            'superadmin@gmail.com',
            '+33-1-00-00-00-00',
            'ROLE_SUPER_ADMIN',
        ]
    ];

    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        foreach (self::ADMIN as $value) {
            $admin = new Admin();
            $admin->setFirstName($value[0]);
            $admin->setLastName($value[1]);
            $hashedPassword = $this->passwordHasher->hashPassword($admin, $value[2]);
            $admin->setPassword($hashedPassword);
            $admin->setEmail($value[3]);
            $admin->setTel($value[4]);
            $admin->setRole($value[5]);
            $manager->persist($admin);
        }
        $manager->flush();
    }
}
