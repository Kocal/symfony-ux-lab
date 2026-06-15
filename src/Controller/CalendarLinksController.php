<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\UX\CalendarLink\CalendarEvent;
use Symfony\UX\CalendarLink\CalendarRecurrence;
use Symfony\UX\CalendarLink\CalendarReminder;

final class CalendarLinksController extends AbstractController
{
    #[Route('/calendar/links', name: 'app_calendar_links')]
    public function index(): Response
    {
        $event = new CalendarEvent(
            'Mon event',
            start: new \DateTimeImmutable('2026-05-12 01:00:00', new \DateTimeZone('Europe/Paris')),
            end: new \DateTimeImmutable('2026-05-12 14:00:00', new \DateTimeZone('Europe/Paris')),
            reminders: [
                new CalendarReminder(60, 'Rappel 1 heure avant'),
                new CalendarReminder(60 * 2, 'Rappel 2 heures avant'),
            ]
        );

        return $this->render('calendar_links/index.html.twig', [
            'event' => $event,
        ]);
    }
}
