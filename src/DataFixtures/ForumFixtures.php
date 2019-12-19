<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Messages;
use App\Entity\Threads;


class ForumFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = \Faker\Factory::create('ro_RO');
        for($i=0;$i<mt_rand(10,15);$i++) {
            $thread = new Threads();
            $thread->setSubject($faker->word); 
            $thread->setAuthor($faker->word);
             $thread->setEmail($faker->email);
             $thread->setText($faker->word);
            $thread->setDatetime(new \DateTime());



            $manager->persist($thread);
            for($j=1;$j<=\mt_rand(20, 40);$j++) {
                $message = new Messages();
                $message->setThread($thread);
                $message->setSubject($faker->word);
                $message->setDatetime(new \DateTime());
                $message->setAuthor($faker->name());
                $message->setEmail($faker->email);
                $message->setText($faker->realText());
                $manager->persist($message);
            }
        }
        $manager->flush();
    }
}
