<?php

namespace App\Entity;

use App\Repository\ReportVideoRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=ReportVideoRepository::class)
 */
class ReportVideo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Serializer\Groups({"list_reports"})
     */
    private $views;

    /**
     * @ORM\ManyToOne(targetEntity=Report::class, inversedBy="reportVideos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $report;

    /**
     * @ORM\ManyToOne(targetEntity=Video::class, inversedBy="reportVideos")
     * @Serializer\Groups({"list_reports"})
     */
    private $video;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getViews(): ?int
    {
        return $this->views;
    }

    public function setViews(int $views): self
    {
        $this->views = $views;

        return $this;
    }

    public function getReport(): ?Report
    {
        return $this->report;
    }

    public function setReport(?Report $report): self
    {
        $this->report = $report;

        return $this;
    }

    public function getVideo(): ?Video
    {
        return $this->video;
    }

    public function setVideo(?Video $video): self
    {
        $this->video = $video;

        return $this;
    }
}
