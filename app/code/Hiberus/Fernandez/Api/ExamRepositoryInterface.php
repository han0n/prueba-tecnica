<?php

namespace Hiberus\Fernandez\Api;

use Hiberus\Fernandez\Api\Data\ExamInterface;

interface ExamRepositoryInterface
{

    /**
     * @param \Hiberus\Fernandez\Api\Data\ExamInterface $examInterface
     * @return \Hiberus\Fernandez\Api\Data\ExamInterface
     */
    public function save(ExamInterface $examInterface);

    /**
     * @param $idExam
     * @return \Hiberus\Fernandez\Api\Data\ExamInterface
     */
    public function getById($idExam);

    /**
     * @param \Hiberus\Exam\Api\Data\ExamInterface $examInterface
     * @return bool
     */
    public function delete(ExamInterface $examInterface);

    /**
     * @param $idExam
     * @return bool
     */
    public function deleteById($idExam);

}
