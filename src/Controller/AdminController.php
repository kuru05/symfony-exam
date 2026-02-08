<?php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\Reservation;
use App\Entity\User;
use App\Repository\EventRepository;
use App\Repository\ReservationRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin')]
#[IsGranted('ROLE_ADMIN')]
class AdminController extends AbstractController
{
    #[Route('/', name: 'app_admin_dashboard')]
    public function dashboard(
        UserRepository $userRepository,
        EventRepository $eventRepository,
        ReservationRepository $reservationRepository
    ): Response {
        return $this->render('admin/dashboard.html.twig', [
            'totalUsers' => $userRepository->count([]),
            'totalEvents' => $eventRepository->count([]),
            'totalReservations' => $reservationRepository->count([]),
            'lastReservations' => $reservationRepository->findBy([], ['createdAt' => 'DESC'], 5), // 5 most recent
        ]);
    }

    #[Route('/events', name: 'app_admin_events')]
    public function manageEvents(EventRepository $eventRepository): Response
    {
        return $this->render('admin/events.html.twig', [
            'events' => $eventRepository->findBy([], ['date' => 'DESC']),
        ]);
    }

    #[Route('/event/{id}/edit', name: 'app_admin_event_edit', methods: ['GET', 'POST'])]
    public function editEvent(Request $request, Event $event, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(\App\Form\EventFormType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Événement modifié avec succès.');

            return $this->redirectToRoute('app_admin_events');
        }

        return $this->render('admin/event_edit.html.twig', [
            'event' => $event,
            'form' => $form,
        ]);
    }

    #[Route('/event/{id}/delete', name: 'app_admin_event_delete', methods: ['POST'])]
    public function deleteEvent(Event $event, EntityManagerInterface $entityManager): Response
    {
        // CSRF protection could be added here
        $entityManager->remove($event);
        $entityManager->flush();

        $this->addFlash('success', 'Événement supprimé avec succès.');

        return $this->redirectToRoute('app_admin_events');
    }

    #[Route('/reservations', name: 'app_admin_reservations')]
    public function manageReservations(ReservationRepository $reservationRepository): Response
    {
        return $this->render('admin/reservations.html.twig', [
            'reservations' => $reservationRepository->findBy([], ['createdAt' => 'DESC']),
        ]);
    }

    #[Route('/reservation/{id}/delete', name: 'app_admin_reservation_delete', methods: ['POST'])]
    public function deleteReservation(Reservation $reservation, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($reservation);
        $entityManager->flush();

        $this->addFlash('success', 'Réservation annulée avec succès.');

        return $this->redirectToRoute('app_admin_reservations');
    }

    #[Route('/users', name: 'app_admin_users')]
    public function manageUsers(UserRepository $userRepository): Response
    {
        return $this->render('admin/users.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    #[Route('/user/{id}/promote', name: 'app_admin_user_promote', methods: ['POST'])]
    public function promoteUser(User $user, EntityManagerInterface $entityManager): Response
    {
        $user->setRoles(['ROLE_ADMIN']);
        $entityManager->flush();

        $this->addFlash('success', 'Utilisateur promu Administrateur.');

        return $this->redirectToRoute('app_admin_users');
    }

    #[Route('/user/{id}/demote', name: 'app_admin_user_demote', methods: ['POST'])]
    public function demoteUser(User $user, EntityManagerInterface $entityManager): Response
    {
        $user->setRoles(['ROLE_USER']);
        $entityManager->flush();

        $this->addFlash('success', 'Privilèges Administrateur révoqués.');

        return $this->redirectToRoute('app_admin_users');
    }

    #[Route('/user/{id}/delete', name: 'app_admin_user_delete', methods: ['POST'])]
    public function deleteUser(User $user, EntityManagerInterface $entityManager): Response
    {
        // Prevent deleting yourself
        if ($user === $this->getUser()) {
            $this->addFlash('danger', 'Vous ne pouvez pas supprimer votre propre compte.');
            return $this->redirectToRoute('app_admin_users');
        }

        $entityManager->remove($user);
        $entityManager->flush();

        $this->addFlash('success', 'Utilisateur supprimé avec succès.');

        return $this->redirectToRoute('app_admin_users');
    }

    #[Route('/users/create', name: 'app_admin_user_create', methods: ['GET', 'POST'])]
    public function createUser(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(\App\Form\UserCreateType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            // Handle Admin Role Checkbox
            if ($form->get('isAdmin')->getData()) {
                $user->setRoles(['ROLE_ADMIN']);
            } else {
                $user->setRoles(['ROLE_USER']);
            }

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Utilisateur créé avec succès.');

            return $this->redirectToRoute('app_admin_users');
        }

        return $this->render('admin/user_create.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
