<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Work;

class ProjectController extends AbstractController
{
    /**
     * @Route("/api/projects")
     */
    public function getWork()
    {
        $repository = $this->getDoctrine()->getRepository(Work::class);
        $works = $repository->findAll();

        $data = [];
        foreach($works as $work){
            $table = [
                "id"=> $work->getId(),
                "title"=> $work->getTitle(),
                "text"=> $work->getText(),
                "workLink"=> $work->getWorkLink(),
                "date"  =>  $work->getDate(),
                "type"=> $work->getType()
            ];
            array_push($data, $table);
        }

        return new JsonResponse($data);
    }
}