<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SLAgentController extends AbstractController
{
    /**
     * @Route("/s/l/agent", name="s_l_agent")
     */
    public function index()
    {
        return $this->render('sl_agent/index.html.twig', [
            'controller_name' => 'SLAgentController',
        ]);
    }
}
