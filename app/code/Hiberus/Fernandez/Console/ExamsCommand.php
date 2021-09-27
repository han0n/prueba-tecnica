<?php

namespace Hiberus\Fernandez\Console;

use Symfony\Component\Console\Command\Command;
use Hiberus\Fernandez\Model\ExamFactory;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExamsCommand extends Command
{

    protected ExamFactory $examFactory;

    public function __construct(
        ExamFactory $examFactory,
        string $id = null
    )
    {
        parent::__construct($id);
        $this->examFactory = $examFactory;
    }

    public function getMarks() {

        $examModel = $this->examFactory->create();

        $examCollection = $examModel->getCollection();
        return $examCollection;

    }

    protected function configure()
    {
        $this->setName('hiberus:fernandez')
            ->setDescription('Mostrar exámenes');

        parent::configure();
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $exams = $this->getMarks();//Se obtiene la colección de exámenes

        $cabecera = sprintf("%1s | %5s | %-15s | %s", 'ID', 'Nota', 'Nombre', 'Apellido');
        $output->writeln('<info>' . $cabecera . '</info>');


        foreach($exams as $exam){

            $id = $exam->getIdExam();
            $firstname = $exam->getFirstName();
            $lastname = $exam->getLastName();
            $mark = $exam->getData('mark');//Para que no afecte el plugin que creamos anteriormente
            $registro = sprintf("%2d | %5.2f | %-15s | %-10s", $id, $mark, $firstname, $lastname);
            $output->writeln( $registro );
        }


    }

}
