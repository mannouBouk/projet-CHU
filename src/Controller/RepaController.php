<?php

namespace App\Controller;

use App\Entity\Repa;
use App\Form\RepaType;
use App\Repository\RepaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/repa")
 *  @IsGranted("ROLE_ADMIN",message="vous n'avez pas le droits d'accées")
 */
class RepaController extends AbstractController
{
    /**
     * @Route("/", name="repa_index", methods={"GET"})
     */
    public function index(RepaRepository $repaRepository): Response
    {
        return $this->render('repa/index.html.twig', [
            'repas' => $repaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="repa_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $repa = new Repa();
        $form = $this->createForm(RepaType::class, $repa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($repa);
            $entityManager->flush();

            return $this->redirectToRoute('repa_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('repa/new.html.twig', [
            'repa' => $repa,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="repa_show", methods={"GET"})
     */
    public function show(Repa $repa): Response
    {
        return $this->render('repa/show.html.twig', [
            'repa' => $repa,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="repa_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Repa $repa, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RepaType::class, $repa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('repa_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('repa/edit.html.twig', [
            'repa' => $repa,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="repa_delete", methods={"POST"})
     */
    public function delete(Request $request, Repa $repa, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $repa->getId(), $request->request->get('_token'))) {
            $entityManager->remove($repa);
            $entityManager->flush();
        }

        return $this->redirectToRoute('repa_index', [], Response::HTTP_SEE_OTHER);
    }
}
