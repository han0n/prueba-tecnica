<?php

namespace Hiberus\Fernandez\Api;

use Hiberus\Fernandez\Api\Data\ExamInterface;
use Magento\Tests\NamingConvention\true\mixed;

interface ExamRepositoryInterface
{


    /**
     * @param string $firstname
     * @param string $lastname
     * @param float $mark
     * @return \Hiberus\Fernandez\Api\Data\ExamInterface
     */
    public function save($firstname, $lastname, $mark);

    /**
     * @param int $idExam
     * @return \Hiberus\Fernandez\Api\Data\ExamInterface
     */
    public function getById($idExam);

    /**
     * @param \Hiberus\Exam\Api\Data\ExamInterface $examInterface
     * @return bool
     */
    public function delete(ExamInterface $examInterface);

    /**
     * @param int $idExam
     * @return bool
     */
    public function deleteById($idExam);

    /**
     * @return mixed
     */
    public function getAll();

}
