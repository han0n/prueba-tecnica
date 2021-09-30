<?php

namespace Hiberus\Fernandez\Model;

use Hiberus\Fernandez\Api\ExamRepositoryInterface;
use Hiberus\Fernandez\Api\Data\ExamInterface;
use Magento\Framework\Exception\CouldNotSaveException;

class ExamRepository implements ExamRepositoryInterface
{

    protected ResourceModel\Exam $resourceExam;
    protected \Hiberus\Fernandez\Api\Data\ExamInterfaceFactory $examInterfaceFactory;

    /**
     * @param ResourceModel\Exam $resourceExam
     * @param \Hiberus\Fernandez\Api\Data\ExamInterfaceFactory $examInterfaceFactory
     */
    public function __construct(
        \Hiberus\Fernandez\Model\ResourceModel\Exam      $resourceExam,
        \Hiberus\Fernandez\Api\Data\ExamInterfaceFactory $examInterfaceFactory
    )
    {
        $this->resourceExam = $resourceExam;
        $this->examInterfaceFactory = $examInterfaceFactory;
    }

    /**
     * @param string $firstname
     * @param string $lastname
     * @param float $mark
     * @return ExamInterface
     * @throws CouldNotSaveException
     */
    public function save($firstname, $lastname, $mark)
    {
        try {
            $exam = $this->examInterfaceFactory->create();
            $exam->setFirstname($firstname);
            $exam->setLastname($lastname);
            $exam->setMark($mark);
            $this->resourceExam->save($exam);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }

        return $exam;

    }

    /**
     * @param int $idExam
     * @return ExamInterface
     */
    public function getById($idExam)
    {
        try {
            $exam = $this->examInterfaceFactory->create();
            $exam->setEntityId($idExam);
            $this->resourceExam->load($exam, $idExam);
        } catch (\Exception $e) {
            $exam = $this->examInterfaceFactory->create();
        }

        return $exam;
    }

    /**
     * @param \Hiberus\Fernandez\Api\Data\ExamInterface $exam
     * @return bool
     */
    public function delete(\Hiberus\Fernandez\Api\Data\ExamInterface $exam)
    {
        try {
            $this->resourceExam->delete($exam);
        } catch (\Exception $e) {

            return false;
        }

        return true;
    }

    /**
     * @param int $idExam
     * @return bool
     */
    public function deleteById($idExam)
    {
        return $this->delete($this->getById($idExam));
    }

    /**
     * @return mixed
     */
    public function getAll(){

        try {
            $examModel = $this->examInterfaceFactory->create();
            $examCollection = $examModel->getCollection()->getData();

        } catch (\Exception $e) {
            $examModel = $this->examInterfaceFactory->create();
        }

        return $examCollection;
    }
}
