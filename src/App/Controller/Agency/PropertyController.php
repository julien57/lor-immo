<?php

namespace App\Controller\Agency;

use App\Entity\Photo;
use App\Entity\Property;
use App\Form\AddPropertyType;
use App\Form\PropertyType;
use App\Model\PropertyDTO;
use App\Service\File\UniqueFileName;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends Controller
{
    use UniqueFileName;

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
     * @Route("/agence/modification/bien/{id}", name="agency_property_edit")
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
     * @Route("/agence/suppression/{id}", name="agency_property_remove")
     */
    public function removeAction(Property $property): RedirectResponse
    {
        $this->em->remove($property);
        $this->em->flush();

        $this->addFlash('notice', 'Annonce bien supprimée !');

        return $this->redirectToRoute('agency_home_dashboard');
    }

    /**
     * @Route("/agence/ajouter-bien", name="agency_property_add")
     */
    public function addAction(Request $request)
    {
        $agency = $this->getUser();
        $propertyDTO = new PropertyDTO();

        $form = $this->createForm(AddPropertyType::class, $propertyDTO)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $property = Property::initProperty($propertyDTO, $agency);

            foreach ($propertyDTO->getPhoto() as $photo) {
                /** @var UploadedFile $file */
                $file = $photo->getName()[0];

                $filename = $this->generateUniqueFileName().'.'.$file->guessExtension();

                try {
                    $file->move(
                        Photo::TARGET_DIR_IMAGE,
                        $filename
                    );
                } catch (FileException $e) {
                    throw new FileException($e->getMessage());
                }

                $newPhoto = new Photo();
                $newPhoto->setName($filename);

                $property->addPhoto($newPhoto);
            }

            $this->em->persist($property);
            $this->em->flush();

            $this->addFlash('notice', 'Annonce bien ajoutée !');

            return $this->redirectToRoute('agency_home_dashboard');
        }

        return $this->render('agency/add.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
