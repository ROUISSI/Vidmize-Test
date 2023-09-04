<?php

namespace App\Command;

use App\Entity\Folder;
use App\Entity\Video;
use App\Entity\VideoEncoder;
use App\Service\UtilsService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ComputeFoldersDepthCommand extends Command
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
            ->setName('compute:folders:depth')
            ->setDescription('Compute folders depth based on number of files related!');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $folders = $this->entityManager->getRepository(Folder::class)->findAll();
            /** @var Folder $folder */
            foreach ($folders as $folder) {
                $folder->setDepth(count($folder->getVideos()->getValues()));
                $this->entityManager->persist($folder);
            }
            $this->entityManager->flush();
        } catch (\Exception $ex) {
            dump($ex->getMessage());
        }


        return Command::SUCCESS;
    }
}
