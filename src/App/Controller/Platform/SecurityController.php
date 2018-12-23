<?php

namespace App\Controller\Platform;

use App\Entity\Agency;
use App\Form\RegistrationType;
use App\Model\RegistrationDTO;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
    /**
     * @param AuthenticationUtils $authenticationUtils
     *
     * @return RedirectResponse|Response
     *
     * @Route("/connexion", name="platform_security_login")
     */
    public function loginAction(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('platform_home_index');
        }

        return $this->render('platform/connection.html.twig', [
            'last_username' => $authenticationUtils->getLastUsername(),
            'error' => $authenticationUtils->getLastAuthenticationError(),
        ]);
    }

    /**
     * @param Request $request
     *
     * @return Response
     *
     * @Route("/inscription", name="platform_security_registration")
     */
    public function registrationAction(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $encoder)
    {
        $registrationDTO = new RegistrationDTO();
        $form = $this->createForm(RegistrationType::class, $registrationDTO)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $agency = Agency::registrationAgency($registrationDTO);
            $agency->setPassword($encoder->encodePassword($agency, $agency->getPassword()));
            $em->persist($agency);
            $em->flush();

            $this->addFlash('notice', 'Inscription réussie, vous pouvez maintenant vous connecter.');

            return $this->redirectToRoute('platform_security_login');
        }

        return $this->render('platform/registration.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
