<?php

namespace App\Controller;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ToDoListController extends AbstractController
{
    /**
     * @Route("/to-do-list", name="to_do_list")
     */
    public function index(): Response
    {
        $tasks = $this->getDoctrine()->getRepository(Task::class)->findBY([], ['id'=>'DESC']);
        return $this->render('to_do_list/index.html.twig', [
            'tasks' => $tasks
        ]);
    }


    /**
     * @Route("/create-task", name="create-task", methods={"POST"})
     */
    public function create(Request $request): Response
    {

        $title = trim($request->request->get('title'));
        if (empty($title)) {
            return $this->redirectToRoute('to_do_list');
        }

        $entityManager = $this->getDoctrine()->getManager();
        $task = new Task();
        $task->setTitle($title);
        $entityManager->persist($task);
        $entityManager->flush();
        return $this->redirectToRoute('to_do_list');
    }



    /**
     * @Route("/switch-status/{id}", name="switch-status" , requirements={"id"="\d+"}))
     */
    public function switchStatus($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $task = $entityManager->getRepository(Task::class)->find($id);

        $task->setStatus( ! $task->getStatus());
        $entityManager->flush();
        return $this->redirectToRoute('to_do_list');
    }


    /**
     * @Route("/delete/{id}", name="task_delete" , requirements={"id"="\d+"}))
     */
    public function deleteTask(Task $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($id);
        $entityManager->flush();
        return $this->redirectToRoute('to_do_list');
    }
}
