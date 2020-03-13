<?php

namespace App\Controller;

use App\Entity\Tickets;
use App\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TicketsRepository;
use Symfony\Component\HttpFoundation\Session\Session;


class FLAgentController extends AbstractController
{
    /**
     * @Route("/flagent", name="flagent")
     */
    public function index()
    {
        /** @var Users $user */
        $session = new Session();
        $userName = $this->getUser()->getLastName();
        $unSelectedTicket = $this->getDoctrine()->getRepository(Tickets::class)->findBy(['ticketStatus' => 'open']);
        $SelectedTicket = $this->getDoctrine()->getRepository(Tickets::class)->findBy(['ticketStatus' => 'inProgress']);
        if(isset($_POST['select'])){
            $selectedTicket = $_POST['select'];
            $selectedTicket = $this->getDoctrine()->getRepository(Tickets::class)->findBy(['id' =>$selectedTicket]);
            $this->editStatusTicket($selectedTicket[0]);
        }

        return $this->render('fl_agent/index.html.twig', ['unSelectedTicket' => $unSelectedTicket,
            'name' => $userName, 'selectedTicket' => $SelectedTicket
            ]);
    }

    /**
     * @Route("/flagent/detail/{ticket}", name="detail")
     * @param Tickets $ticket
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function TicketDetail (Tickets $ticket){

        /**
         * @var Tickets $thisTickets
         */
        $thisTickets= $this->getDoctrine()->getRepository(Tickets::class)->findOneBy(['id' => $ticket]);

        $thisTickets->getAssignTo();

        return $this->render('fl_agent/ticketDetail.html.twig', ['ticket' => $ticket]);
    }

    public function editStatusTicket($ticket)
    {
        $em = $this->getDoctrine()->getManager();
        $ticketObject = $em->getRepository(Tickets::class)->find($ticket);
        if (!$ticketObject){
            throw $this->createNotFOundException('No ticket found');
        }
        $ticketObject->setTicketStatus('inProgress');
        $em->flush();
       // $selectedTicket = $this->getDoctrine()->getRepository(Tickets::class)->findBy(['id' => $ticket]);
    }


}
