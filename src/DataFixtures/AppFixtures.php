<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Event;
use App\Entity\Reservation;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        // 1. Categories
        $categories = [];
        $categoryNames = ['Tech', 'Design', 'Business', 'Marketing', 'Loisirs'];
        
        foreach ($categoryNames as $name) {
            $category = new Category();
            $category->setName($name);
            $manager->persist($category);
            $categories[] = $category;
        }

        // 2. Users
        $users = [];
        $admin = new User();
        $admin->setEmail('admin@eventhub.com');
        $admin->setPseudo('Admin User');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->hasher->hashPassword($admin, 'password'));
        $manager->persist($admin);
        
        // Add some normal users
        for ($i = 0; $i < 5; $i++) {
            $user = new User();
            $user->setEmail("user$i@example.com");
            $user->setPseudo("User $i");
            $user->setPassword($this->hasher->hashPassword($user, 'password'));
            $manager->persist($user);
            $users[] = $user;
        }

        // 3. Events
        $cities = ['Paris', 'Lyon', 'Marseille', 'Bordeaux', 'Nantes'];
        
        for ($i = 0; $i < 20; $i++) {
            $event = new Event();
            $event->setTitle("Événement #" . ($i + 1));
            $event->setDescription("Ceci est une description pour l'événement #" . ($i + 1) . ". Venez nombreux pour découvrir des choses incroyables !");
            $event->setDate(new \DateTime('+' . rand(1, 30) . ' days'));
            $event->setLocation($cities[array_rand($cities)]);
            $event->setMaxPlaces(rand(10, 100));
            $event->setCategory($categories[array_rand($categories)]);
            $event->setCreator($users[array_rand($users)]); // Random user is creator
            
            $manager->persist($event);
            
            // Create some reservations for this event
            if (rand(0, 1)) {
                $reservation = new Reservation();
                $reservation->setEvent($event);
                $reservation->setUser($admin); // Admin reserves some events
                $reservation->setGuestCount(rand(1, 4));
                $manager->persist($reservation);
            }
        }

        $manager->flush();
    }
}
