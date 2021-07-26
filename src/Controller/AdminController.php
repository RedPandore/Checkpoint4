<?php

namespace App\Controller;

use App\Repository\InformationRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/telecharge", name="download")
 */
class AdminController extends AbstractController
{

    /**
     * @Route("/", name="_cv")
     **/
    public function downloadFileAction(InformationRepository $informationRepository)
    {
        //get all information entity
        $information = $informationRepository->findAll();
        
        // tri $information en fonction de leur dernier mise à jour
        usort($information, function ($a, $b) {
            return strcmp($b->getUpdatedAt()->format('Y-m-d H:i:s'), $a->getUpdatedAt()->format('Y-m-d H:i:s'));
        });

        // recupere le nom de curriculum
        $curriculumName = $information[0]->getCurriculum();

        $response = new BinaryFileResponse('uploads/curriculums/'.$curriculumName);
        $response->setContentDisposition(ResponseHeaderBag::DISPOSITION_ATTACHMENT, 'Tennessee Houry.pdf');
        return $response;
    }

}
