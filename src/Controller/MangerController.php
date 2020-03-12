<?php
//session_start();
namespace App\Controller;


use App\Entity\Tickets;
use App\Entity\Users;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class MangerController extends AbstractController
{
    /**
     * @Route("/manger", name="manger")
     */
    public function index()
    {

        $userEmail = $this->getUser()->getUsername();

        $openTickets= $this->getDoctrine()->getRepository(Tickets::class)->findBy(['ticketStatus' => 'open']);
        $openTickets = count($openTickets);

        $closedTickets= $this->getDoctrine()->getRepository(Tickets::class)->findBy(['ticketStatus' => 'close']);
        $closedTickets = count($closedTickets);

        $showTickets= $this->getDoctrine()->getRepository(Tickets::class)->findAll();

       $open = 0;
        $close = 0;
/*
        for ($i = 0; $i < count($showTickets); $i++) {

            if ($showTickets->getTicketStatus() == 'open'){
                $open++;
            }
            if ($showTickets . ticketStatus == 'close') {
                $close++;
            }
        }*/

   /*     $userManager = new Users();
        $userManager->setLastName('last name');*/


        $showTickets = new Tickets();
        $showTickets->setReOpen(20);

        return $this->render('manger/index.html.twig', [
            //'manager_name' => $userManeger->getUser()->getUsername(),
            'userManager' => $userEmail,
            'showTickets' => $showTickets->getReOpen(),
            'showTicketsClose' => $closedTickets,
            'showTicketsOpen' => $openTickets,
            'userID' => 2,

        ]);

    }

    /**
     * @Route("/manger/TicketList", name="ticketlist")
     */
    public function TicketList (){


        $tickets = $this->getDoctrine()->getRepository(Tickets::class)->findAll();

        return $this->render('manger/TicketList.html.twig', array('tickets' => $tickets));
    }

   /**
     * @Route("/manger/AddAgent/{ticket}", name="ticketdetailes")
     */
    public function TicketDetailes (Tickets $ticket){
        return $this->render('manger/AddAgent.html.twig', array('tickets' => $ticket));
    }

    /**
     * @Route("/manger/AddAgent/", name="AddAgent")
     */
    public function AddAgent (){

        $tickets = $this->getDoctrine()->getRepository(Tickets::class)->find();

        return $this->render('manger/AddAgent.html.twig', array('tickets' => $tickets));
    }

}
