<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Service\Securizer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Security\Core\Authorization\AccessDecisionManagerInterface;



class HediChekerController extends AbstractController
{
    /**
     * @Route("/hedicheker", name="hedi_cheker")
     * 
     */

    public function index(): Response
    {

        $content = $this->renderView('hedi_cheker/index.html.twig');
        return new Response($content);
    }
}
