<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HediChekerController extends AbstractController
{
    /**
     * @Route("/hedicheker", name="hedi_cheker")
     */
    public function index(): Response
    {
        $content = $this->renderView('hedi_cheker/index.html.twig');
        return new Response($content);
    }
}
