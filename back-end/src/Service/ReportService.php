<?php


namespace App\Service;


use App\Entity\Report;
use App\Entity\ReportVideo;
use App\Entity\Video;
use Doctrine\Persistence\ManagerRegistry;

class ReportService
{
    /**
     * @var ManagerRegistry
     */
    private $doctrine;


    /**
     * UserService constructor.
     * @param ManagerRegistry $doctrine
     */
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }


    /**
     * @param $data
     * @return bool
     */
    public function createReport($data) : bool
    {
        try {
            $em = $this->doctrine->getManager();
            $report = new Report();
            $report->setName("Report " . strtotime('now'));
            $em->persist($report);
            foreach ($data as $key => $value) {
                $reportVideo = new ReportVideo();
                $reportVideo->setReport($report);
                $reportVideo->setVideo($em->getRepository(Video::class)->find($key));
                $reportVideo->setViews($value);
                $em->persist($reportVideo);
            }
            $em->flush();
        } catch (\Exception $ex) {
            return false;
        }
        return true;
    }


}
