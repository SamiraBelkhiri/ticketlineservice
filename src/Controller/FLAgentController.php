<?php

namespace App\Controller;

use App\Entity\Tickets;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TicketsRepository;

class FLAgentController extends AbstractController
{
    /**
     * @Route("/flagent", name="flagent")
     */
    public function index()
    {
        $ticket = $this->getDoctrine()->getRepository(Tickets::class)->findBy(['ticketStatus' => 'open']);
        return $this->render('fl_agent/index.html.twig', array('ticket' => $ticket)
        );
    }

}
