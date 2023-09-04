<?php

namespace App\Command;

use App\Entity\Video;
use App\Entity\VideoEncoder;
use App\Service\UtilsService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ComputeCarbonneCommand extends Command
{

    private $entityManager;
    private $utilsService;

    public function __construct(EntityManagerInterface $entityManager, UtilsService $utilsService)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
        $this->utilsService = $utilsService;
    }

    protected function configure(): void
    {
        $this
            ->setName('compute:carbon')
            ->setDescription('Convert video size to carbon consumed!');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $videos = $this->entityManager->getRepository(Video::class)->findAll();
            $videosEncoder = $this->entityManager->getRepository(VideoEncoder::class)->findAll();
            /** @var Video $video */
            foreach ($videos as $video) {
                $moValue = $this->utilsService->convertBytes($video->getSize(), 'o', 'Mo');
                $video->setEmissionCo2($moValue * 0.05);
                $this->entityManager->persist($video);
            }
            $this->entityManager->flush();

            /** @var VideoEncoder $videoEncoder */
            foreach ($videosEncoder as $videoEncoder) {
                $moValue = $this->utilsService->convertBytes($videoEncoder->getSize(), 'o', 'Mo');
                $videoEncoder->setEmissionCo2($moValue * 0.05);
                $this->entityManager->persist($videoEncoder);
            }
            $this->entityManager->flush();
        } catch (\Exception $ex) {
            dump($ex->getMessage());
        }


        return Command::SUCCESS;
    }
}
