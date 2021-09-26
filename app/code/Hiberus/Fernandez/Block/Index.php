<?php

namespace Hiberus\Fernandez\Block;

use Hiberus\Fernandez\Model\ExamFactory;

class Index extends \Magento\Framework\View\Element\Template
{

    protected $examFactory;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        ExamFactory $examFactory
    ) {
        parent::__construct($context);
        $this->examFactory = $examFactory;
    }

    public function getMarks() {

        $examModel = $this->examFactory->create();

        $examCollection = $examModel->getCollection();
        return $examCollection;

    }

    public function getBestExam($exams){

        $bestExam = 0; //Recoje Exam, no un entero

        foreach ($exams as $exam){

            if($exam->getIdExam() == 1){
                $_exam = $exam;
                $bestExam = $exam;
            }

            if($exam->getIdExam() > 1){
                if ($exam->getMark() > $_exam->getMark()){
                    $bestExam = $exam;
                }
            }

            $_exam = $exam;

        }

        return $bestExam;
    }

    public function getMarkAverage($exams){

        $total = 0; //Recoje un float
        $i = 0;

        foreach ($exams as $exam){
            $total = $total + $exam->getMark();
            $i++;
        }

        $average = $total/$i;

        return $average;

    }

}
