<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/my-profile")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="my_profile")
     */
    public function myProfile(): Response
    {
        return $this->render('admin/my_profile.html.twig');
    }


    /**
     * @Route("/categories", name="categories")
     */
    public function categories(): Response
    {
        return $this->render('admin/categories.html.twig');
    }

    /**
     * @Route("/edit-categories", name="edit_category")
     */
    public function editCategories(): Response
    {
        return $this->render('admin/edit_category.html.twig');
    }

    /**
     * @Route("/videos", name="videos")
     */
    public function videos(): Response
    {
        return $this->render('admin/videos.html.twig');
    }

    /**
     * @Route("/upload-video", name="upload_video")
     */
    public function uploadVideo(): Response
    {
        return $this->render('admin/upload_video.html.twig');
    }

    /**
     * @Route("/users", name="users")
     */
    public function users(): Response
    {
        return $this->render('admin/users.html.twig');
    }
}
