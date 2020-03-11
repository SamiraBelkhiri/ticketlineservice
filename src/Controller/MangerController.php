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
        //$this->getUser()->getUsername();

     /*   $tickets  = $this->getDoctrine()->getManager()->getRepository(Tickets::class)
            ->findBy([
                'priority' => 1,
                'user' => $this->getUser()
            ]);
        $_SESSION["userID"] = 1;

        $result = $this->getName( 1);
        var_dump($result);*/

        return $this->render('manger/index.html.twig', [
            'manager_name' => $this->getUser()->getUsername(),
        ]);

    }

}
