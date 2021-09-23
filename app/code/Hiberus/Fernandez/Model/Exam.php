<?php

namespace Hiberus\Fernandez\Model;

use Hiberus\Fernandez\Api\Data\ExamInterface;
use Magento\Framework\Model\AbstractModel;

class Exam extends AbstractModel implements ExamInterface
{

    protected function _construct()
    {
        $this->_init(\Hiberus\Fernandez\Model\ResourceModel\Exam::class);
    }

    /**
     * @inheritDoc
     */
    public function getIdExam()
    {
        return $this->getData('id_exam');
    }

    /**
     * @inheritDoc
     */
    public function setIdExam($idExam)
    {
        return $this->setData('entity_id', $idExam);
    }

    /**
     * @inheritDoc
     */
    public function getFirstName()
    {
        return $this->getData('firstname');
    }

    /**
     * @inheritDoc
     */
    public function setFirstName($firstname)
    {
        return $this->setData('firstname', $firstname);
    }

    /**
     * @inheritDoc
     */
    public function getLastName()
    {
        return $this->getData('apellido');
    }

    /**
     * @inheritDoc
     */
    public function setLastName($lastname)
    {
        return $this->setData('lastname', $lastname);
    }

    /**
     * @inheritDoc
     */
    public function getMark()
    {
        return $this->getData('mark');
    }

    /**
     * @inheritDoc
     */
    public function setMark($mark)
    {
        return $this->setData('mark', $mark);
    }
}