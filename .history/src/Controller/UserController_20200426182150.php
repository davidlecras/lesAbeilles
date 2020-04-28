<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends AbstractController
{
    /**
     * @Route("/MyprofileCreation", name="user_creation")
     */
    public function user_creation(Request $request, UserPasswordEncoderInterface $encode)
    {
        $manager = $this->getDoctrine()->getManager();
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $passwordCrypte = $encode->encodePassword($user, $user->getPassword());
            $user->setPassword($passwordCrypte);
            $user->setRoles('ROLE_USER');
            $user->setCreatedAt(new \DateTime('now'));
            $manager->persist($user);
            $manager->flush();
            $this->addFlash('success', "Bienvenue parmis nous");
            return $this->redirectToRoute('login');
        }
        return $this->render('user/inscription.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $util)
    {
        $error = $util->getLastAuthenticationError();
        return $this->render('user/login.html.twig', [
            'lastUserName' => $util->getLastUsername(),
            'error' => $error !== null,
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
    }

    /**
     * @Route("/myProfile", name="my_profile")
     */
    public function myProfile(User $user)
    {
        return $this->render('user/myProfile.html.twig', [
            'user' => user
        ]);
    }
}
