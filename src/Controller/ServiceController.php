<?php

namespace App\Controller;

use App\Entity\Service;
use App\Form\ServiceType;
use App\Repository\ServiceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
 * @Route("/service")
 *  @IsGranted("ROLE_ADMIN",message="vous n'avez pas le droits d'accées")
 */
class ServiceController extends AbstractController
{
    /**
     * @Route("/", name="service_index", methods={"GET"})
     */
    public function index(ServiceRepository $serviceRepository): Response
    {
        return $this->render('service/index.html.twig', [
            'services' => $serviceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="service_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $service = new Service();
        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($service);
            $entityManager->flush();

            return $this->redirectToRoute('service_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('service/new.html.twig', [
            'service' => $service,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="service_show", methods={"GET"})
     */
    public function show(Service $service): Response
    {
        return $this->render('service/show.html.twig', [
            'service' => $service,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="service_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Service $service, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ServiceType::class, $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('service_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('service/edit.html.twig', [
            'service' => $service,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="service_delete", methods={"POST"})
     */
    public function delete(Request $request, Service $service, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $service->getId(), $request->request->get('_token'))) {
            $entityManager->remove($service);
            $entityManager->flush();
        }

        return $this->redirectToRoute('service_index', [], Response::HTTP_SEE_OTHER);
    }
    /**
     * @Route("/{id}/detaile", name="service_detaile", methods={"GET"})
     */

    public function detaile(ServiceRepository $serviceRepository, Service $service): Response
    {

        //$id = ('service' => $request->query->get('id'));
        $id = $service->getId();
        return $this->render('service/detaile.html.twig', [

            'services' => $serviceRepository->findAllPatientInService($id),
        ]);
    }
}
