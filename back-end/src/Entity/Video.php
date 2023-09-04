<?php

namespace App\Entity;

use App\Repository\VideoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity(repositoryClass=VideoRepository::class)
 */
class Video
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups({"list_videos", "list_reports"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups({"list_videos", "list_reports"})
     */
    private $name;
    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups({"list_videos"})
     */
    private $duration;
    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups({"list_videos", "list_reports"})
     */
    private $size;
    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups({"list_reports"})
     */
    private $emissionCo2;
    /**
     * @ORM\Column(type="string", length=255)
     * @Serializer\Groups({"list_videos", "list_reports"})
     */
    private $quality;

    /**
     * @ORM\ManyToMany(targetEntity=Folder::class, inversedBy="videos")
     * @Serializer\Groups({"list_reports"})
     * @ORM\OrderBy({"depth" = "desc"})
     */
    private $folders;

    /**
     * @ORM\OneToMany(targetEntity=ReportVideo::class, mappedBy="video")
     */
    private $reportVideos;

    /**
     * @var VideoEncoder
     * @Serializer\SerializedName("video_encoder")
     * @Serializer\Groups({"list_videos", "list_reports"})
     */
    private $videoEncoder;

    /**
     * @var string
     * @Serializer\SerializedName("size_go")
     * @Serializer\Groups({"list_videos", "list_reports"})
     */
    private $sizeGo;
    /**
     * @var string
     * @Serializer\SerializedName("gain_carbon")
     * @Serializer\Groups({"list_videos", "list_reports"})
     */
    private $gainCarbon;

    /**
     * @var string
     * @Serializer\SerializedName("reduc_size")
     * @Serializer\Groups({"list_videos", "list_reports"})
     */
    private $reducSize;

    public function __construct()
    {
        $this->folders = new ArrayCollection();
        $this->reportVideos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration): void
    {
        $this->duration = $duration;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size): void
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getEmissionCo2()
    {
        return $this->emissionCo2;
    }

    /**
     * @param mixed $emissionCo2
     */
    public function setEmissionCo2($emissionCo2): void
    {
        $this->emissionCo2 = $emissionCo2;
    }

    /**
     * @return mixed
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * @param mixed $quality
     */
    public function setQuality($quality): void
    {
        $this->quality = $quality;
    }

    /**
     * @return Collection<int, Folder>
     */
    public function getFolders(): Collection
    {
        return $this->folders;
    }

    public function addFolder(Folder $folder): self
    {
        if (!$this->folders->contains($folder)) {
            $this->folders[] = $folder;
        }

        return $this;
    }

    public function removeFolder(Folder $folder): self
    {
        $this->folders->removeElement($folder);

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
            $reportVideo->setVideo($this);
        }

        return $this;
    }

    public function removeReportVideo(ReportVideo $reportVideo): self
    {
        if ($this->reportVideos->removeElement($reportVideo)) {
            // set the owning side to null (unless already changed)
            if ($reportVideo->getVideo() === $this) {
                $reportVideo->setVideo(null);
            }
        }

        return $this;
    }

    public function getVideoEncoder(): VideoEncoder
    {
        return $this->videoEncoder;
    }

    public function setVideoEncoder(VideoEncoder $videoEncoder): void
    {
        $this->videoEncoder = $videoEncoder;
    }

    public function getSizeGo(): string
    {
        return $this->sizeGo;
    }

    public function setSizeGo(string $sizeGo): void
    {
        $this->sizeGo = $sizeGo;
    }

    public function getGainCarbon(): string
    {
        return $this->gainCarbon;
    }

    public function setGainCarbon(string $gainCarbon): void
    {
        $this->gainCarbon = $gainCarbon;
    }

    public function getReducSize(): string
    {
        return $this->reducSize;
    }

    public function setReducSize(string $reducSize): void
    {
        $this->reducSize = $reducSize;
    }





}
