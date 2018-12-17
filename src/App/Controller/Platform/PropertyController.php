<?php

namespace App\Controller\Platform;

use App\Entity\Property;
use App\Form\SearchPropertyType;
use App\Model\SearchPropertyDTO;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends Controller
{
    /**
     * @Route("/biens/{page}", defaults={"page": 1}, requirements={"\d+"}, name="platform_property_properties")
     */
    public function propertiesAction(EntityManagerInterface $em, PaginatorInterface $knpPaginator, Request $request)
    {
        $searchPropertyDTO = new SearchPropertyDTO();
        $form = $this->createForm(SearchPropertyType::class, $searchPropertyDTO);
        $form->handleRequest($request);

        $pagination = $knpPaginator->paginate(
            $em->getRepository(Property::class)->findAllProperties($searchPropertyDTO),
            $request->query->getInt('page', 1),
            9
        );

        return $this->render('platform/properties.html.twig', [
            'pagination' => $pagination,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/bien/{id}", name="platform_property_show")
     */
    public function showAction(Property $property)
    {
        return $this->render('platform/show_property.html.twig', [
            'property' => $property,
        ]);
    }
}