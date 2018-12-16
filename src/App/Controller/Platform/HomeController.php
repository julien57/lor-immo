<?php

namespace App\Controller\Platform;

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
        $properties = $em->getRepository(Property::class)->findLast9Properties();

        return $this->render('platform/index.html.twig', [
            'properties' => $properties
        ]);
    }
}
