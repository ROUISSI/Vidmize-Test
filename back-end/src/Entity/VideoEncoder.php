<?php

namespace App\Entity;

use App\Repository\VideoRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * @ORM\Entity
 */
class VideoEncoder
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Serializer\Groups({"list_videos"})
     */
    private $id;

    /**
     * @var Video
     * @ORM\ManyToOne(targetEntity="Video")
     * @ORM\JoinColumn(name="video_id", referencedColumnName="id", nullable=true)
     * @Serializer\Groups({"list_videos"})
     *
     */
    private $videoSource;

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
     * @Serializer\Groups({"list_videos"})
     */
    private $quality;

    /**
     * @var string
     * @Serializer\Groups({"list_reports"})
     * @Serializer\SerializedName("size_go")
     * @Serializer\Groups({"list_videos", "list_reports"})
     */
    private $sizeGo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVideoSource(): Video
    {
        return $this->videoSource;
    }

    public function setVideoSource(Video $videoSource): void
    {
        $this->videoSource = $videoSource;
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

    public function getSizeGo(): string
    {
        return $this->sizeGo;
    }

    public function setSizeGo(string $sizeGo): void
    {
        $this->sizeGo = $sizeGo;
    }


}
