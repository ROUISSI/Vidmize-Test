<?php

namespace App\Entity;

use App\Repository\ReportRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=ReportRepository::class)
 */
class Report
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups({"list_reports"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups({"list_reports"})
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=ReportVideo::class, mappedBy="report")
     * @Serializer\Groups({"list_reports"})
     */
    private $reportVideos;

    public function __construct()
    {
        $this->reportVideos = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, ReportVideo>
     */
    public function getReportVideos(): Collection
    {
        return $this->reportVideos;
    }

    public function addReportVideo(ReportVideo $reportVideo): self
    {
        if (!$this->reportVideos->contains($reportVideo)) {
            $this->reportVideos[] = $reportVideo;
            $reportVideo->setReport($this);
        }

        return $this;
    }

    public function removeReportVideo(ReportVideo $reportVideo): self
    {
        if ($this->reportVideos->removeElement($reportVideo)) {
            // set the owning side to null (unless already changed)
            if ($reportVideo->getReport() === $this) {
                $reportVideo->setReport(null);
            }
        }

        return $this;
    }
}
