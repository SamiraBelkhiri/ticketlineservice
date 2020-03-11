<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
session_start();
class MangerController extends AbstractController
{
    /**
     * @Route("/manger", name="manger")
     */


    public function index()
    {
        $_SESSION["userID"] = 1;


        return $this->render('manger/index.html.twig', [
            'manager_name' => 'here we are',
        ]);


    }

   /* public function getManagerName (int $managerID){

        /// connection with the db
        $categorRepository = $this->getDoctrine()->getManagers()

            $user = $categorRepository->getRepository('ticketlineservice\src\Entity\Users')->find($managerID);
        return $this->render('',['categories'=>$user]);

    }

    public function

    $dql = 'SELECT Users FROM App:category Users ORDER BY Users.userName DESC ';
}*/
