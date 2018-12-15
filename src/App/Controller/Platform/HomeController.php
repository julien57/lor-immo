<?php

namespace App\Controller\Platform;

use App\Entity\Agency;
use App\Entity\Property;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{
    /**
     * @Route("/", name="platform_home_index")
     */
    public function indexAction(EntityManagerInterface $em)
    {
        $properties = $em->getRepository(Property::class)->findAll();

        return $this->render('platform/index.html.twig', [
            'properties' => $properties
        ]);
    }

    /**
     * @Route("/bien/{id}", name="platform_home_show")
     */
    public function showAction(Property $property)
    {
        return $this->render('platform/show.html.twig', [
            'property' => $property
        ]);
    }
}
