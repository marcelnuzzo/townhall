<?php

namespace App\DataFixtures;

use App\Entity\TownHall;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstname('Smith');
        $user->setLastname('Will');
        $user->setPhone('0123456789');
        $user->setEmail('will.smith@gmail.com');
        $user->setCreatedat(new \DateTime());
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            '1234'
        ));
        $manager->persist($user);
        $manager->flush();
       
    }
}
