<?php


namespace App\AppListener;


use App\Entity\Invitation;
use App\Entity\User;
use App\Entity\Video;
use App\Entity\VideoEncoder;
use App\Service\UtilsService;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class LifeCycleCallbackListener
{
    private $tokenStorage;
    private $doctrine;
    private $entityManager;
    private $utilsService;

    /**
     * LifeCycleCallbackListener constructor.
     * @param $tokenStorage
     */
    public function __construct(
        TokenStorageInterface  $tokenStorage,
        ManagerRegistry        $doctrine,
        EntityManagerInterface $entityManager,
        UtilsService           $utilsService
    )
    {
        $this->tokenStorage = $tokenStorage;
        $this->entityManager = $entityManager;
        $this->doctrine = $doctrine;
        $this->utilsService = $utilsService;
    }


    /**
     * @param LifecycleEventArgs $args
     * @return $this
     */
    public function postLoad(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();
        if ($entity instanceof Video) {
            $videoEncoder = $this->doctrine->getManager()->getRepository(VideoEncoder::class)->findOneBy(array('videoSource' => $entity));
            $entity->setVideoEncoder($videoEncoder);
            $sizeGo = $this->utilsService->convertBytes((int)$entity->getSize(), 'o', 'Go');
            $entity->setSizeGo($sizeGo);
            $gain = ((float)$entity->getEmissionCo2() - (float)$videoEncoder->getEmissionCo2()) * 1000;
            $entity->setGainCarbon($gain);
            $reduce = 100 - (((int)$videoEncoder->getSize() / (int)$entity->getSize()) * 100);
            $entity->setReducSize($reduce);
        }
        if ($entity instanceof VideoEncoder) {
            $sizeGo = $this->utilsService->convertBytes((int)$entity->getSize(), 'o', 'Go');
            $entity->setSizeGo($sizeGo);
        }
        return $this;
    }
}
