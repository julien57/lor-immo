<?php

namespace App\Controller\Agency;

use App\Entity\Property;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
    /**
     * @Route("/agence/dashboard", name="agency_home_dashboard")
     */
    public function dashboardAction(EntityManagerInterface $em, Request $request)
    {
        $agency = $this->getUser();
        $agencyProperties = $em->getRepository(Property::class)->findByAgency($agency);
        $nbProperties = count($agencyProperties);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $agencyProperties,
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('agency/home.html.twig', [
            'pagination' => $pagination,
            'nbProperties' => $nbProperties,
        ]);
    }
}
