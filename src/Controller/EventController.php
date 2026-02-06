<?php

namespace App\Controller;

use App\Entity\Event;
use App\Entity\Reservation;
use App\Form\EventFormType;
use App\Form\ReservationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/event')]
class EventController extends AbstractController
{
    #[Route('/', name: 'app_event_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $events = $entityManager->getRepository(Event::class)->findBy([], ['date' => 'ASC']);

        return $this->render('event/index.html.twig', [
            'events' => $events,
        ]);
    }

    #[Route('/create', name: 'app_event_new', methods: ['GET', 'POST'])]
    #[IsGranted('ROLE_USER')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $event = new Event();
        $form = $this->createForm(EventFormType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $event->setCreator($this->getUser());
            // Default image for now
            $event->setImageFilename('placeholder.jpg');

            $entityManager->persist($event);
            $entityManager->flush();

            $this->addFlash('success', 'Votre événement a été créé avec succès !');

            return $this->redirectToRoute('app_event_index');
        }

        return $this->render('event/create.html.twig', [
            'eventForm' => $form->createView(),
        ]);
    }
    
    #[Route('/{id}', name: 'app_event_show', methods: ['GET', 'POST'])]
    public function show(Event $event, Request $request, EntityManagerInterface $entityManager): Response
    {
        $reservation = new Reservation();
        $form = $this->createForm(ReservationFormType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && $this->getUser()) {
            $reservation->setEvent($event);
            $reservation->setUser($this->getUser());
            
            $entityManager->persist($reservation);
            $entityManager->flush();

            $this->addFlash('success', 'Votre réservation a été enregistrée !');

            return $this->redirectToRoute('app_event_show', ['id' => $event->getId()]);
        }

        return $this->render('event/show.html.twig', [
            'event' => $event,
            'reservationForm' => $form->createView(),
        ]);
    }
}
