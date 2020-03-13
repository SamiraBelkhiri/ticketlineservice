<?php

namespace App\Controller;

use App\Entity\Tickets;
use App\Entity\Users;
use App\Form\CreateTicketType;
use App\Form\RegistrationFormType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    /**
     * @Route("/customer", name="customer")
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function createTicket(Request $request): Response
    {
        /** @var Users $user */
        /** @var Tickets $ticket */

        $ticket = new Tickets();
        $user = $this -> getUser();
        $form = $this -> createForm(CreateTicketType::class, $ticket);

        $form -> handleRequest($request);
        //var_dump($form);
        if ($form -> isSubmitted() && $form -> isValid()) {
            $ticket -> setUser($user);
            $ticket -> setTicketTitle($form -> getData() -> getTicketTitle());
            $ticket -> setOpenTime(new \DateTime('@' . strtotime('now')));
            $ticket -> setCloseTime(new \DateTime('@' . strtotime('now')));
            $ticket -> setPriority('low');
            $ticket -> setTicketStatus('open');
            $ticket -> setAssignTo(0);
            $ticket -> setReOpen(0);
            $ticket -> setOpenTimee(new \DateTime('@' . strtotime('now')));
            $ticket -> setCloseTimee(new \DateTime('@' . strtotime('now')));

            $entityManager = $this -> getDoctrine() -> getManager();
            $entityManager -> persist($ticket);
            $entityManager -> flush();

            $this -> addFlash('success', 'Ticket created');
            return $this -> redirectToRoute('customer');
        }

        $userDetails = $this -> allOpenTickets($user);

        return $this -> render('customer/index.html.twig', [
            'createTicket' => $form -> createView(),
            'allTickets' => $userDetails
        ]);
    }

    public function allOpenTickets($userID): array
    {
        /** @var Users $user */
        /** @var Tickets $ticket */

        //$ticket = new Tickets();

        $unSelectedTicket = $this -> getDoctrine() -> getRepository(Tickets::class) -> findBy(['user' => $userID]);

        return $unSelectedTicket;

    }
}
