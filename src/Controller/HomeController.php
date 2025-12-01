<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\FacturaRepository;
use App\Repository\ProvinciaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        UserRepository $userRepository,
        FacturaRepository $facturaRepository,
        ProvinciaRepository $provinciaRepository
    ): Response
    {
        // Obtener estadísticas
        $totalUsers = count($userRepository->findAll());
        $totalFacturas = count($facturaRepository->findAll());
        $totalProvincias = count($provinciaRepository->findAll());
        
        // Obtener últimos registros
        $recentUsers = $userRepository->findBy([], ['id' => 'DESC'], 5);
        $recentFacturas = $facturaRepository->findBy([], ['id' => 'DESC'], 5);
        
        return $this->render('home/index.html.twig', [
            'totalUsers' => $totalUsers,
            'totalFacturas' => $totalFacturas,
            'totalProvincias' => $totalProvincias,
            'recentUsers' => $recentUsers,
            'recentFacturas' => $recentFacturas,
        ]);
    }
}
