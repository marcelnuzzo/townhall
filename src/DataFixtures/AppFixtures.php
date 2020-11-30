<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Message;
use App\Entity\Structure;
use Faker;
use Faker\Factory;
use App\Entity\User;
use App\Entity\TownHall;
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
       $faker = Faker\Factory::create('fr_FR');
        $userRepo = $manager->getRepository('App:User');

        $user1 = new User();
        $user1->setFirstname('Smith');
        $user1->setLastname('Will');
        $user1->setPhone('0123456789');
        $user1->setEmail('will.smith@gmail.com');
        $user1->setCreatedat(new \DateTime());
        $user1->setRoles(['ROLE_ADMIN']);
        $user1->setPassword($this->passwordEncoder->encodePassword(
            $user1,
            '1234'
        ));
        $manager->persist($user1);
        $manager->flush();
		
		$user2 = new User();
        $user2->setFirstname($faker->firstName)
            ->setlastname($faker->lastName)
            ->setPhone($faker->phoneNumber)
            ->setEmail($faker->email)
            ->setFirstname($faker->firstName)
            ->setCreatedat(new \DateTime())
            ->setRoles(['ROLE_USER'])
            ->setPassword($this->passwordEncoder->encodePassword(
                $user2,
                '1234'
            ));
        $manager->persist($user2);
        $manager->flush();
		/*
		$townhall = new TownHall();
        $townhall->setName('Mairie de Cergy');
		$townhall->setLogoName('ogo');
		$townhall->setContent('Mairie de Cergy');
        $townhall->setSummar($faker->text);
		$townhall->setStory($faker->text);
        $townhall->setPhone('0123456789');
        $townhall->setEmail('contact@paris.com');
		$townhall->setPostaladdress('2 avenue georges beqand Cergy');
		$townhall->setWebsite('www.cergy.fr');
		$townhall->setUpdateAt(new \DateTime());
		$townhall->setLatitude(4);
		$townhall->setLongitude(10);
		$townhall->setImageName("blabla");
		$townhall->setNameMayor("blabla");
		$manager->persist($townhall);
        $manager->flush();
        */
        
        $category = [
            'Événement',
            'Alerte info',
            'Annonce',
        ];
		for($i=1; $i<=10; $i++) {
            if($i < 5) {
                $user = $user2;
            } else {
                $user = $user1;
            }
            shuffle($category);
            $cat = $category[0];
            $article = new Article();
            $article->setTitle($faker->sentence(6))
                    ->setCategory($cat)
                    ->setSummar($faker->sentence(6))
                    ->setContent($faker->paragraph)
                    ->setPublishedAt($faker->dateTimeBetween('-100 days', '-1 days'))
                    ->setUser($user);

            $manager->persist($article);
        }
        $manager->flush();

        for($i=1; $i<=10; $i++) {
            $message = new Message();
            $message->setObject($faker->word(5))
                    ->setEmail($faker->email())
                    ->setStatus($faker->word())
                    ->setContent($faker->sentence(2))
                    ->setAccept(mt_rand(0, 1))
                    ->setReceivedAt($faker->dateTimeBetween('-10 days', '-1 days'));

            $manager->persist($message);    
        }
        $manager->flush();

        $etsScolaire = [
             'École maternelle',
             'École primaire',
             'Coolège',
             'Lycée'
        ];
        $orgType = [
             'association',
             'commerce',
             'transport',
             'établissements scolaire'
        ];

        for($i=1; $i<=10; $i++) {
            if($i > 4) {
                $uti = $user1;
            } else {
                $uti = $user2;
            }
            shuffle($orgType);
            $org = $orgType[0];
            if(strcmp('Etablissement scolaire', $org) === 0) {
                shuffle($etsScolaire);
                $etsSco = $etsScolaire[0];
            } else {
                $etsSco = null;
            }
            $structure = new Structure();
            $structure->setOrganizationType($org)
                    ->setSchoolType($etsSco)
                    ->setName($faker->name())
                    ->setSummar($faker->sentence(3))
                    ->setContent($faker->paragraph())
                    ->setPostaladdress($faker->country()." ".$faker->address())
                    ->setPhone($faker->phoneNumber())
                    ->setEmail($faker->email())
                    ->setWebsite($faker->url())
                    ->setCreatedAt($faker->dateTimeBetween('-10 years', '-1 years'))
                    ->setUser($uti);

            $manager->persist($structure);     
        }
        $manager->flush();

		
    }
}
