<?php

namespace App\Controller;

use App\Entity\StarshipAdmin;
use App\Repository\StarshipAdminRepository;
use App\Repository\StarshipRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StarshipController extends AbstractController
{
    #[Route('/starships/{id<\d+>}', name: 'app_starship_show')]
    // StarshipRepository $repository,
    public function show(int $id, StarshipAdminRepository $repository): Response
    {
        /** @var StarshipAdmin|null $starship] */
        $starship = $repository->findOneBy(['id' => $id]);

        if (!$starship) {
            throw $this->createNotFoundException('Starship not found');
        }

        return $this->render('starship/show.html.twig', [
            'ship' => $starship,
        ]);
    }
}
