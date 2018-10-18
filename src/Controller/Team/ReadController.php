<?php

namespace App\Controller\Team;

use App\Controller\TokenAuthenticatedController;
use App\Entity\Team;
use App\Repository\TeamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

class ReadController extends Controller implements TokenAuthenticatedController
{
    public function season(Request $request, SerializerInterface $serializer, TeamRepository $teamRepository)
    {
        $teams = $teamRepository
               ->findBySeason($request->get('season'));

        return new Response(
            $serializer->serialize([
                'status' => Response::HTTP_OK,
                'result' => $teams
            ], 'json'),
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );
    }
}
