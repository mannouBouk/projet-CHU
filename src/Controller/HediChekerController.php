<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Service\Securizer;

class HediChekerController extends AbstractController
{
    /**
     * @Route("/hedicheker", name="hedi_cheker")
     * @IsGranted("ROLE_ADMIN",message="vous n'avez pas le droits d'accées")
     */
    public function index(): Response
    {
        $content = $this->renderView('hedi_cheker/index.html.twig');
        return new Response($content);
    }
}
