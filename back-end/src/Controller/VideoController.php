<?php

namespace App\Controller;

use App\Service\ReportService;
use App\Service\UtilsService;
use App\Service\VideoService;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Request\ParamFetcherInterface;


/**
 * @Route("/api", name="api_")
 */
class VideoController extends AbstractController
{
    /**
     * @Route("/video/all", name="app_video_all")
     */
    public function all(VideoService $videoService): JsonResponse
    {
        try {
            $videos = $videoService->getAllVideos();
            $serializer = SerializerBuilder::create()
                ->build();
            $data = $serializer->serialize($videos, 'json', SerializationContext::create()->setGroups(array('list_videos')));
            return $this->json(json_decode($data));
        } catch (\Exception $ex) {
            return $this->json(json_decode($ex->getMessage()));
        }
    }

    /**
     * @Route("/report/all", name="app_report_all")
     */
    public function allReports(VideoService $videoService): JsonResponse
    {
        $reports = $videoService->getAllReports();
        $serializer = SerializerBuilder::create()
            ->build();
        $data = $serializer->serialize($reports, 'json', SerializationContext::create()->setGroups(array('list_reports')));
        return $this->json(json_decode($data));
    }

    /**
     * @Route("/video/create/report", name="app_video_create_report", methods="POST")
     */
    public function createReport(Request $request, ReportService $reportService, UtilsService $utilsService): JsonResponse
    {
        $request = $utilsService->transformJsonBody($request);
        $response = $reportService->createReport($request->request->all());
        if ($response) {
            return $this->json(array("message" => "ok"), 200);
        } else {
            throw new \Exception("Erreur");
        }
    }

}
