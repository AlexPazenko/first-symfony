<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Services\GiftsService;

class DefaultController extends AbstractController
{

    /*public function __construct(GiftsService $gifts)
    {
        $gifts->gifts = ['a', 'b', 'c', 'd'];
    }*/
    /**
     * @Route("/default/", name="default")
     */
    public function index(GiftsService $gifts)
    {
        /*$users = ['Adam', 'Robert', 'John', 'Susan'];*/
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
        /*$entityManager = $this->getDoctrine()->getManager();
        $user = new User;
        $user->setName('Adam');
        $user2 = new User;
        $user2->setName('Robert');
        $user3 = new User;
        $user3->setName('John');
        $user4 = new User;
        $user4->setName('Susan');
        $entityManager->persist($user);
        $entityManager->persist($user2);
        $entityManager->persist($user3);
        $entityManager->persist($user4);
        exit($entityManager->flush());*/


        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
            'users' => $users,
            'random_gift' => $gifts->gifts,
        ]);
        /*return $this->Json(['username'=>'john.doe']);*/
        /*return new Response("Hello! $name");*/

        /*return $this->redirectToRoute('default2');*/
    }

    /**
     * @Route("/default3/", name="default2")
     */
    /*public function index2()
    {
        return new Response('I am from default2 route!');
    }*/
}
