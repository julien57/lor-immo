<?php

namespace App\Controller\Agency;

use App\Entity\Property;
use App\Form\PropertyType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends Controller
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param Property $property
     * @param Request  $request
     *
     * @return RedirectResponse|Response
     *
     * @Route("/modification/bien/{id}", name="agency_property_edit")
     */
    public function editAction(Property $property, Request $request)
    {
        $form = $this->createForm(PropertyType::class, $property)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();

            $this->addFlash('notice', 'Annonce bien modifiée !');

            return $this->redirectToRoute('agency_home_dashboard');
        }

        return $this->render('agency/edit.html.twig', [
            'property' => $property,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Property $property
     *
     * @return RedirectResponse
     *
     * @Route("/suppression/{id}", name="agency_property_remove")
     */
    public function removeAction(Property $property): RedirectResponse
    {
        $this->em->remove($property);
        $this->em->flush();

        return $this->redirectToRoute('agency_home_dashboard');
    }
}
