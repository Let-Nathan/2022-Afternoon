<?php

namespace App\DataFixtures;

use App\Entity\BusinessRole;
use App\Entity\Skill;
use App\Entity\Domain;
use App\Entity\Candidate;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SkillAndStuffFixtures extends Fixture
{
    private const SKILL = [
        'Java 7',
        'Php 7/8',
        'Node Js',
        'React',
        'Angular',
        'Go',
        'Vu JS',
    ];
    private const DOMAIN = [
        'JavaScript',
        'React',
        'Symfony',
        'Python',
        'Ruby',
        'Laravel'
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::SKILL as $name) {
            $skill = new Skill();
            $skill->setSkillName($name);
            $manager->persist($skill);
            $this->addReference('skill_' . $name, $skill);
        }
        foreach (self::DOMAIN as $name) {
            $domain = new Domain();
            $domain->setDomaineName($name);
            $manager->persist($domain);
            $this->addReference('domain_' . $name, $domain);
        }
        $manager->flush();
    }
}
