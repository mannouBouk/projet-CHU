<?php

namespace App\Controller;

use App\Entity\CadreMedicale;
use App\Form\CadreMedicaleType;
use App\Repository\CadreMedicaleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/cadre/medicale")
 */
class CadreMedicaleController extends AbstractController
{
    /**
     * @Route("/", name="cadre_medicale_index", methods={"GET"})
     * @IsGranted("ROLE_USER",message="vous n'avez pas le droits d'accées")
     */
    public function index(CadreMedicaleRepository $cadreMedicaleRepository): Response
    {
        return $this->render('cadre_medicale/index.html.twig', [
            'cadre_medicales' => $cadreMedicaleRepository->findAllCadre(),
        ]);
    }

    /**
     * @Route("/new", name="cadre_medicale_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cadreMedicale = new CadreMedicale();
        $form = $this->createForm(CadreMedicaleType::class, $cadreMedicale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cadreMedicale);
            $entityManager->flush();

            return $this->redirectToRoute('cadre_medicale_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cadre_medicale/new.html.twig', [
            'cadre_medicale' => $cadreMedicale,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="cadre_medicale_show", methods={"GET"})
     */
    public function show(CadreMedicale $cadreMedicale): Response
    {
        return $this->render('cadre_medicale/show.html.twig', [
            'cadre_medicale' => $cadreMedicale,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cadre_medicale_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, CadreMedicale $cadreMedicale, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CadreMedicaleType::class, $cadreMedicale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('cadre_medicale_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cadre_medicale/edit.html.twig', [
            'cadre_medicale' => $cadreMedicale,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="cadre_medicale_delete", methods={"POST"})
     */
    public function delete(Request $request, CadreMedicale $cadreMedicale, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $cadreMedicale->getId(), $request->request->get('_token'))) {
            $entityManager->remove($cadreMedicale);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cadre_medicale_index', [], Response::HTTP_SEE_OTHER);
    }
}
