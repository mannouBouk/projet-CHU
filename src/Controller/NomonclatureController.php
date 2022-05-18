<?php

namespace App\Controller;

use App\Entity\Nomonclature;
use App\Form\NomonclatureType;
use App\Repository\NomonclatureRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/nomonclature")
 */
class NomonclatureController extends AbstractController
{
    /**
     * @Route("/", name="app_nomonclature_index", methods={"GET"})
     */
    public function index(NomonclatureRepository $nomonclatureRepository): Response
    {
        return $this->render('nomonclature/index.html.twig', [
            'nomonclatures' => $nomonclatureRepository->findAllNomonclature(),
        ]);
    }

    /**
     * @Route("/new", name="app_nomonclature_new", methods={"GET", "POST"})
     */
    public function new(Request $request, NomonclatureRepository $nomonclatureRepository): Response
    {
        $nomonclature = new Nomonclature();
        $form = $this->createForm(NomonclatureType::class, $nomonclature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $nomonclatureRepository->add($nomonclature);
            return $this->redirectToRoute('app_nomonclature_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('nomonclature/new.html.twig', [
            'nomonclature' => $nomonclature,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_nomonclature_show", methods={"GET"})
     */
    public function show(Nomonclature $nomonclature, NomonclatureRepository $nomonclatureRepository): Response
    {
        $id = $nomonclature->getId();
        $n = new Nomonclature();

        $n = $nomonclatureRepository->findOneNomonclatureById($id);
        return $this->render('nomonclature/show.html.twig', [
            'nomonclature' => $n

        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_nomonclature_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Nomonclature $nomonclature, NomonclatureRepository $nomonclatureRepository): Response
    {
        $form = $this->createForm(NomonclatureType::class, $nomonclature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $nomonclatureRepository->add($nomonclature);
            return $this->redirectToRoute('app_nomonclature_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('nomonclature/edit.html.twig', [
            'nomonclature' => $nomonclature,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_nomonclature_delete", methods={"POST"})
     */
    public function delete(Request $request, Nomonclature $nomonclature, NomonclatureRepository $nomonclatureRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $nomonclature->getId(), $request->request->get('_token'))) {
            $nomonclatureRepository->remove($nomonclature);
        }

        return $this->redirectToRoute('app_nomonclature_index', [], Response::HTTP_SEE_OTHER);
    }
}
