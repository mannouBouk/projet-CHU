<?php

namespace App\Controller;

use App\Entity\RepasServis;
use App\Form\RepasServisType;
use App\Entity\Patient;
use App\Repository\RepasServisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("/repas_servis")
 */

class RepasServisController extends AbstractController
{
    /**
     * @Route("/", name="app_repas_servis_index", methods={"GET"})
     */
    public function index(RepasServisRepository $repasServisRepository): Response
    {
        return $this->render('repas_servis/index.html.twig', [
            'repas' => $repasServisRepository->findAllPatientServis(),
        ]);
    }


    /**
     * @Route("/repas_servis", name="app_repas_servis_valide_show", methods={"GET"})
     */
    public function showRepasServis(RepasServisRepository $repasServisRepository): Response
    {
        return $this->render('repas_servis/showRepasServis.html.twig', [
            'repas' => $repasServisRepository->findAllRepasServis(),
        ]);
    }

    /**
     * @Route("/new", name="app_repas_servis_new", methods={"GET", "POST"})
     */
    public function new(Request $request, RepasServisRepository $repasServisRepository): Response
    {
        $repasServi = new RepasServis();
        $form = $this->createForm(RepasServisType::class, $repasServi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $repasServisRepository->add($repasServi);
            return $this->redirectToRoute('app_repas_servis_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('repas_servis/new.html.twig', [
            'repas_servi' => $repasServi,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_repas_servis_show", methods={"GET"})
     */
    public function show(RepasServis $repasServi): Response
    {
        return $this->render('repas_servis/show.html.twig', [
            'repas_servi' => $repasServi,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_repas_servis_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, RepasServis $repasServi, RepasServisRepository $repasServisRepository): Response
    {
        $form = $this->createForm(RepasServisType::class, $repasServi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $repasServisRepository->add($repasServi);
            return $this->redirectToRoute('app_repas_servis_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('repas_servis/edit.html.twig', [
            'repas_servi' => $repasServi,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_repas_servis_delete", methods={"POST"})
     */
    public function delete(Request $request, RepasServis $repasServi, RepasServisRepository $repasServisRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $repasServi->getId(), $request->request->get('_token'))) {
            $repasServisRepository->remove($repasServi);
        }

        return $this->redirectToRoute('app_repas_servis_index', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/changeServis/{id}/{servis}", name="change_repas_servis", methods={"GET","POST","PUT"})
     */
    public function changeServis(
        Patient $patient, 
        bool $servis, 
        int $status = 0,  
        RepasServisRepository $repasServisRepository,
        EntityManagerInterface $em
    ): Response
    {

        if ($servis == true) {
            $status = $repasServisRepository->insertServisPatient($patient->getId());
            $repasServi = new RepasServis();
            $repasServi->setPatient($patient);
            $repasServi->setServis('1');
            $repasServi->setDateHeure(new \DateTime());
            $repasServisRepository->add($repasServi);
        }else{
            $repasServi = $repasServisRepository->findOneByPatient($patient->getId());
            foreach($repasServi as $repas){
                $repasS = $repasServisRepository->find($repas['id']);
                $repasS->setServis('0');
                $em->flush();
            

                
            }
            
        }

        return $this->redirectToRoute('app_repas_servis_index', [], Response::HTTP_SEE_OTHER);
    }
}
