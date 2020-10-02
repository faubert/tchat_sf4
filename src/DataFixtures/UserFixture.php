<?php

namespace App\DataFixtures;

use App\Entity\ApiToken;
use App\Entity\Connexion;
use App\Entity\Message;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends BaseFixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    protected function loadData(ObjectManager $manager)
    {
        $this->createMany(10, 'main_users', function($i) use ($manager) {
            $user = new User();
            $user->setEmail(sprintf('chat%d@example.com', $i));
            $user->setFirstName($this->faker->firstName);

            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                'engage'
            ));

            $message = new Message();
            $message->setContent($this->faker->text);
            $message->setDateCreate($this->faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null));
            $connexion = new Connexion();
            $connexion->setUser($user);
            $connexion->setDateCon($this->faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null));
            $message->setConnexion($connexion);
            $apiToken1 = new ApiToken($user);
            $apiToken2 = new ApiToken($user);

            $manager->persist($connexion);
            $manager->persist($message);
            $manager->persist($apiToken1);
            $manager->persist($apiToken2);

            return $user;
        });

        $this->createMany(3, 'admin_users', function($i) {
            $user = new User();
            $user->setEmail(sprintf('admin%d@chat.com', $i));
            $user->setFirstName($this->faker->firstName);
            $user->setRoles(['ROLE_ADMIN']);

            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                'engage'
            ));

            return $user;
        });

        $manager->flush();
    }
}
