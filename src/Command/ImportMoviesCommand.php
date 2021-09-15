<?php
// src/Command/ImportMoviesCommand.php
namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Doctrine\ORM\EntityManagerInterface;

use App\Service\MovieService;

class ImportMoviesCommand extends Command
{
	// the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:import-movies';


    public function __construct(EntityManagerInterface $manager, MovieService $movieService)
    {
        parent::__construct(self::$defaultName);
        $this->movieService = $movieService;
    }

    protected function configure(): void
    {
        $this
        ->setDescription('Imports a list of Movies from XML.')

        ->setHelp('This command allows you to import a list of movies from XML.')
    	;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
    	$io = new SymfonyStyle($input, $output);

    	$this->movieService->ParseMovieFromXml('C:\Users\Gazh\Desktop\movies.xml');
    	$this->movieService->populateDatabase();

    	$io->success('Import reussi.');

    	return Command::SUCCESS;
    }
}