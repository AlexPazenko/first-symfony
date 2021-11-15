<?php

namespace App\Controller;

/*use http\Cookie;*/

use App\Entity\Music;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Services\GiftsService;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use App\Entity\Author;
use App\Entity\File;
use App\Entity\Pdf;
use App\Entity\Video;
use App\Services\ServiceInterface;
use App\Services\MySecondService;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Adapter\TagAwareAdapter;
use App\Events\VideoCreatedEvent;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use App\Form\MusicFormType;




class DefaultController extends AbstractController
{

 /*   public function __construct($logger)
    {

    }*/

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }
    /**
     * @Route("/home", name="default", name="home")
     */
    public function index(Request $request)
    {

        /*public function index(GiftsService $gifts, Request $request, SessionInterface $session, ServiceInterface $service,
                              ContainerInterface $container)*/

        /*$users = $this->getDoctrine()->getRepository(User::class)->findAll();*/

        /*if (!$users) {
            throw $this->createNotFoundException('The user do not exist');
        }*/

        /* $this->addFlash(
             'notice',
             'Your changes were saved!'
         );

         $this->addFlash(
             'warning',
             'Your changes were saved!'
         );*/

        /*$entityManager = $this->getDoctrine()->getManager();*/
        /*$users = $this->getDoctrine()->getRepository(User::class)->findAll();*/

       /* $user = $entityManager->getRepository(User::class)->find(1);*/
       /* $user = new User();*/
       /* $user->setName('Robert');
        $entityManager->persist($user);
        $entityManager->flush();*/

        /*dump($container->get('app.myservice'));*/

        /*$author = $entityManager->getRepository(Author::class)->findByIdWithPdf(1);
        dump($author);*/
        /*$service->someAction();
        $service->someSecondAction();*/

        /*foreach($author->getFiles() as $file)
        {
            if ($file instanceof Pdf)
            {
            dump($file->getFileName());
            }
        }*/

/*     // -------  Caching ----- //
        $cache = new FilesystemAdapter();
        $posts = $cache->getItem('database.get_posts');

        if (!$posts->isHit())
        {
            $posts_from_db = ['post1', 'post2', 'post3'];
            dump('connected with database ...');
            $posts->set(serialize($posts_from_db));
            $posts->expiresAfter(5);
            $cache->save($posts);
        }

        $cache->clear();
        dump(unserialize($posts->get()));*/

       /* $cache = new TagAwareAdapter(

            new FilesystemAdapter()
        );

        $acer = $cache->getItem('acer');
        $dell = $cache->getItem('dell');
        $ibm = $cache->getItem('ibm');
        $apple = $cache->getItem('apple');

        if (!$acer->isHit())
        {
            $acer_from_db = 'acer laptop';
            $acer->set($acer_from_db);
            $acer->tag(['computers', 'laptop', 'acer']);
            $cache->save($acer);
            dump('acer laptop from database ... ');
        }


        if (!$dell->isHit())
        {
            $dell_from_db = 'dell laptop';
            $dell->set($dell_from_db);
            $dell->tag(['computers', 'laptop', 'dell']);
            $cache->save($dell);
            dump('dell laptop from database ... ');
        }


        if (!$ibm->isHit())
        {
            $ibm_from_db = 'ibm desktop';
            $ibm->set($ibm_from_db);
            $ibm->tag(['computers', 'desktops', 'ibm']);
            $cache->save($ibm);
            dump('ibm laptop from database ... ');
        }

        if (!$apple->isHit())
        {
            $apple_from_db = 'apple desktop';
            $apple->set($apple_from_db);
            $apple->tag(['computers', 'desktops', 'apple']);
            $cache->save($apple);
            dump('apple laptop from database ... ');
        }
        $cache->invalidateTags(['ibm']);
        $cache->invalidateTags(['computers']);
        dump($acer->get());
        dump($dell->get());
        dump($ibm->get());
        dump($apple->get());*/

        /*$video = new \stdClass();
        $video->title = 'Fanny movie';
        $video->category = 'fanny';

        $event = new VideoCreatedEvent($video);
//        $this->dispatcher->dispatch('video.created.event', $event  );
        $this->dispatcher->dispatch( $event  );*/

        $entityManager = $this->getDoctrine()->getManager();
        $music = $entityManager->getRepository(Music::class)->findAll();
        dump($music);
        $music = new Music();
/*        $music->setTitle('Write a blog post');
        $music->setCreatedAt(new \DateTime('tomorrow'));*/

//        $music = $entityManager->getRepository(Music::class)->find(1);

        $form = $this->createForm(MusicFormType::class, $music);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager->persist($music);
            $entityManager->flush();
            return $this->redirectToRoute('home');
        }

         return $this->render('default/index.html.twig', [
             'controller_name' => 'DefaultController',
             'form' => $form->createView(),
             /*'users' => $users,
             'random_gift' => $gifts->gifts,*/
         ]);

        /* $entityManager = $this->getDoctrine()->getManager();
          $user = new User();
          $user->setName('Robert');
          $entityManager->persist($user);
          $entityManager->flush();
          dump('A new user was saved with the id of '. $user->getId());*/

         /* ---get users ---*/
        /*$repository = $this->getDoctrine()->getRepository(User::class);*/
        /*$user = $repository->find(1);*/
        /*$user = $repository->findOneBy(['name' => 'Robert', 'id' => '3']);*/
//        $user = $repository->findBy(['name' => 'Robert'],['id' => 'DESC']);
        /*$users = $repository->findAll();
        dump($users);*/

        /* ---update users ---*/
        /*$entityManager = $this->getDoctrine()->getManager();
        $id = 1;
        $user = $entityManager->getRepository(User::class)->find($id);

        if (!$user)
        {
            throw $this->createNotFoundException(
                'No user found for id ' .$id
            );
        }
        $user->setName('New user name');
        $entityManager->flush();
        dump($user);*/

        /* --- delete users --- */
        /*$entityManager = $this->getDoctrine()->getManager();
        $id = 3;
        $user = $entityManager->getRepository(User::class)->find($id);
        $entityManager->remove($user);
        $entityManager->flush();
        dump($user);*/

        /* --- delete users --- */
        /*$entityManager = $this->getDoctrine()->getManager();
        $conn = $entityManager->getConnection();

        $sql = '
        SELECT * FROM user u
        WHERE u.id > :id
        ';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => 3]);*/

        /*$result = $stmt->fetchAll();
        dump($result);*/
        /*dump($stmt->fetchAll());*/

       /* $entityManager = $this->getDoctrine()->getManager();
        $user = new User;
        $user->setName('Bill');
        for($i=1; $i <= 2; $i++)
        {
            $video = new Video();
            $video->setTitle('Video title -' . $i);
            $user->addVideo($video);
            $entityManager->persist($video);
        }
        $entityManager->persist($user);
        $entityManager->flush();

        dump('Created a video with the id of ' . $video->getId());
        dump('Created a user with the id of ' . $user->getId());*/


        /*$video = $this->getDoctrine()->getRepository(Video::class)->find(1);
        dump($video->getUser()->getName());*/

        /*$user = $this->getDoctrine()->getRepository(User::class)->find(1);
        dump($user);
        foreach($user->getVideos() as $video)
        {
            dump($video->getTitle());
        }*/

        /*$entityManager = $this->getDoctrine()-> getManager();
        $user = $this->getDoctrine()->getRepository(User::class)->find(1);
        $entityManager->remove($user);
        $entityManager->flush();
        dump($user);*/

        /*$entityManager = $this->getDoctrine()->getManager();
        $user = new User();
        $user->setName('John');
        $address = new Address();
        $address->setStreet('street');
        $address->setNumber(23);
        $user->setAddress($address);
        $entityManager->persist($user);
        $entityManager->persist($address);
        $entityManager->flush();

        dump($user->getAddress()->getStreet());*/

        /*$entityManager = $this->getDoctrine()->getManager();
        $user6 = $this->getDoctrine()->getRepository(User::class)->find(6);*/
        /*for ($i = 1; $i<=3; $i++)
        {
            $user = new User();
            $user->setName('Billy-Bob');
            $entityManager->persist($user);
        }
        $entityManager->flush();
        dump('Last user id - '. $user->getId());*/
/*
        $user6 = $entityManager->getRepository(User::class)->find(6);
        $user7 = $entityManager->getRepository(User::class)->find(7);
        $user8 = $entityManager->getRepository(User::class)->find(8);*/

        /* $user6->addFollowed($user7);
         $user6->addFollowed($user8);
         $entityManager->flush();*/

        /*dump($user6->getFollowed()->count());
        dump($user6->getFollowing()->count());
        dump($user7->getFollowing()->count());*/

        /*$entityManager = $this->getDoctrine()->getManager();*/

        /*$user = new User();
        $user->setName('Billy-Bob');

        for ($i=1; $i<=3; $i++)
        {
            $video = new Video();
            $video->setTitle('Video title - '.$i);
            $user->addVideo($video);
            $entityManager->persist($video);
        }
        $entityManager->persist($user);
        $entityManager->flush();*/

        /*$user = $entityManager->getRepository(User::class)->findWithVideos(1);
        dump($user);*/

//        return $this->render('default/index.html.twig', [
//            'controller_name' => 'DefaultController',
//
//        ]);
    }
    /**
     * @Route("/home/{id}", name="default", name="home22")
     */
    /*public function index22(Request $request, User $user)
    {

        dump($user);

        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController'
        ]);
    }*/

    /**
     * @Route("/default3/", name="default2")
     */
    /*public function index2()
    {
        return new Response('I am from default2 route!');
    }*/

    /**
     * @Route ("/blog/{page?}", name="blog_list", requirements={"page"="\d+"})
     */

    public function index2()
    {
        return new Response('Optional parameters in url and requirements for parameters');
    }


    /**
     * @Route (
     *
     *     "/articles/{_locale}/{year}/{slug}/{category}",
     *     defaults={"category": "computers"},
     *     requirements={
     *       "_locale": "en|fr",
     *       "category":"computers|rtv",
     *       "year": "\d+"
     *     }
     * )
     */

    public function index3()
    {
        return new Response('An advanced route example');
    }

    /**
     * @Route ({
     *     "nl": "/over-ons",
     *     "en": "/about-us"
     *     }, name="about_us"
     *     )
     */

    public function index4()
    {
        return new Response('Translated routes');
    }

    /**
     *
     * @Route("generate-url/{param?}", name="generate_url")
     *
     */

    public  function generate_url()
    {
        exit($this->generateUrl(
            'generate_url',
            array('param' => 10),
            UrlGeneratorInterface::ABSOLUTE_URL
        ));
    }

    /**
     * @Route ("/download")
     */
    public function download()
    {
        $path = $this->getParameter('download_directory');
        return $this->file($path.'images/small_bird.jpg');
    }


    /**
     * @Route("/redirect-test")
     */
    public function redirectTest()
    {
        return $this->redirectToRoute('generate_url');
    }

    /**
     * @Route ("/forwarding-to-controller/{param?}")
     */
    public function forwardingToConroller()
    {
        $response = $this->forward(
            'App\Controller\DefaultController::methodToForwardTo',
            array('param' => '25')
        );
        return $response;
    }


    /**
     * @Route("/url-to-forward-to/{param?}", name="rout_to_forward_to")
     */
    public function methodToForwardTo($param)
    {
       exit('Test controller forwarding - '.$param);
    }


    public function mostPopularPosts ($number = 3)
    {
        //database call:
        $posts = ['post 1', 'post 2', 'post 3', 'post 4' ];
        return $this->render('default/most_popular_posts.html.twig', [
            'posts' => $posts,
        ]);
    }

}

