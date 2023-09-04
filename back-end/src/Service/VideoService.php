<?php


namespace App\Service;


use App\Entity\Report;
use App\Entity\Video;
use Doctrine\Persistence\ManagerRegistry;

class VideoService
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
     * @return Video[]|array|object[]
     */
    public function getAllVideos(): array
    {
        $em = $this->doctrine->getManager();
        return $em->getRepository(Video::class)->findAll();
    }

    /**
     * @return Report[]|array|object[]
     */
    public function getAllReports(): array
    {
        $em = $this->doctrine->getManager();
        return $em->getRepository(Report::class)->findAll();
    }


}
