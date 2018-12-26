<?php

namespace App\Controller\Agency;

use App\Entity\Agency;
use App\Form\AgencyType;
use App\Model\AgencyDTO;
use App\Service\Agency\UpdateAgency;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AgencyController extends Controller
{
    /**
     * @Route("/agence/parametres", name="agency_agency_settings")
     */
    public function settingsAction(Request $request, UpdateAgency $updateAgency, EntityManagerInterface $em)
    {
        /** @var Agency $agency */
        $agency = $this->getUser();

        $agencyDTO = new AgencyDTO();
        $form = $this->createForm(AgencyType::class, $agencyDTO)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $updateAgency->update($agencyDTO, $agency);
            $em->flush();

            $this->addFlash('notice', 'Paramètres de l\'agence sauvegardés.');
            return $this->redirectToRoute('agency_home_dashboard');
        }

        return $this->render('agency/settings.html.twig', [
            'agency' => $agency,
            'form' => $form->createView()
        ]);
    }
}