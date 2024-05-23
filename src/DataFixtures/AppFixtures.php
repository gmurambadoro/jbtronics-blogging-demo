<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Factory\PostFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

final class AppFixtures extends Fixture
{
    private const PASSWORD = '$2y$13$VL1W7rkdUsjXPAQlicNbrufuTdQO1AVdwj5hhJzfredpZ1dCXrd/2'; // password

    public function load(ObjectManager $manager): void
    {
        // create 2 users
        $admin = (new User())
            ->setAdministrator(true)
            ->setUsername('admin')
            ->setPassword(self::PASSWORD);

        $user = (new User())
            ->setUsername('user')
            ->setAdministrator(false)
            ->setPassword(self::PASSWORD);

        $manager->persist($admin);
        $manager->persist($user);
        $manager->flush();

        PostFactory::createMany(30);
    }
}
