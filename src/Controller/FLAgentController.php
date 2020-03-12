<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FLAgentController extends AbstractController
{
    /**
     * @Route("/f/l/agent", name="f_l_agent")
     */
    public function index()
    {
        return $this->render('fl_agent/index.html.twig', [
            'controller_name' => 'FLAgentController',
        ]);
    }
}
