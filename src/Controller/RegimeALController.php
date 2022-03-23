<?php

namespace App\Controller;

use App\Entity\RegimeAL;
use App\Form\RegimeALType;
use App\Repository\RegimeALRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/regime/a/l")
 */
class RegimeALController extends AbstractController
{
    /**
     * @Route("/", name="regime_a_l_index", methods={"GET"})
     */
    public function index(RegimeALRepository $regimeALRepository): Response
    {
        return $this->render('regime_al/index.html.twig', [
            'regime_a_ls' => $regimeALRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="regime_a_l_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $regimeAL = new RegimeAL();
        $form = $this->createForm(RegimeALType::class, $regimeAL);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($regimeAL);
            $entityManager->flush();

            return $this->redirectToRoute('regime_a_l_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('regime_al/new.html.twig', [
            'regime_a_l' => $regimeAL,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="regime_a_l_show", methods={"GET"})
     */
    public function show(RegimeAL $regimeAL): Response
    {
        return $this->render('regime_al/show.html.twig', [
            'regime_a_l' => $regimeAL,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="regime_a_l_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, RegimeAL $regimeAL, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RegimeALType::class, $regimeAL);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('regime_a_l_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('regime_al/edit.html.twig', [
            'regime_a_l' => $regimeAL,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="regime_a_l_delete", methods={"POST"})
     */
    public function delete(Request $request, RegimeAL $regimeAL, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $regimeAL->getId(), $request->request->get('_token'))) {
            $entityManager->remove($regimeAL);
            $entityManager->flush();
        }

        return $this->redirectToRoute('regime_a_l_index', [], Response::HTTP_SEE_OTHER);
    }
}
