<?php


namespace App\Controller;


use App\Entity\Connexion;
use App\Entity\Message;
use App\Entity\User;
use App\Repository\MessageRepository;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ChatController extends BaseController
{
    /**
     * @var MessageRepository $messageRepo
     */
    private $messageRepo;

    /**
     * @var UserRepository $userRepo
     */
    private $userRepo;

    public function __construct(MessageRepository $messageRepo, UserRepository $userRepository)
    {
        $this->messageRepo = $messageRepo;
        $this->userRepo = $userRepository;
    }

    /**
     * @Route("/", name="app_homepage")
     */
    public function index()
    {
        $messages = $this->messageRepo->findAllOrderedByDate();
        $connected_users = $this->messageRepo->findAllConnectedUsers();

        return $this->render('tchat/dashboard.html.twig', [
            'messages' => $messages
        ]);
        //dd($messages);
    }

    /**
     * @param Request $request
     * @Route("/addMessage", name="app_add_message")
     */
    public function addMessage(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        $user = $this->userRepo->find($request->request->get('user_id'));
        $message = new Message();
        $message->setContent($request->request->get('message'));
        $connexion = new Connexion();
        $connexion->setDateCon(new \DateTime('now'));
        $connexion->setUser($user);
        $connexion->addMessage($message);
        $message->setDateCreate(new \DateTime('now'));


        $manager->persist($connexion);
        $manager->persist($message);

        $manager->flush();

        return $this->redirectToRoute('app_homepage');
    }
}