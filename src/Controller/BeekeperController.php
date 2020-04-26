<?php

namespace App\Controller;

use App\Repository\BeekeeperRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BeekeperController extends AbstractController
{
    /**
     * @Route("/beekepers", name="beekepers")
     */
    public function index(BeekeeperRepository $beekeperRepo)
    {
        $beekeepers = $beekeperRepo->findAll();
        return $this->render('beekeper/index.html.twig', [
            'beekeepers' => $beekeepers,
        ]);
    }
}
