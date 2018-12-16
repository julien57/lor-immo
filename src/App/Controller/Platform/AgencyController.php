<?php

namespace App\Controller\Platform;

use App\Entity\Agency;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AgencyController extends Controller
{
    /**
     * @Route("/agences", name="platform_agency_agencies")
     */
    public function agenciesAction(EntityManagerInterface $em, PaginatorInterface $paginator, Request $request)
    {
        $agencies = $em->getRepository(Agency::class)->findAll();

        $pagination = $paginator->paginate(
            $agencies,
            $request->query->getInt('page', 1),
            6
        );

        return $this->render('platform/agencies.html.twig', [
            'pagination' => $pagination
        ]);
    }
}