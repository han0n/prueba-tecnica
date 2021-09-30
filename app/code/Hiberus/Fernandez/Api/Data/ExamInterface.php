<?php

namespace Hiberus\Fernandez\Api\Data;

use \Magento\Framework\Api\ExtensibleDataInterface;

interface ExamInterface extends ExtensibleDataInterface
{

    public const TABLE_NAME = 'hiberus_exam';
    public const COLUMN_ID = 'id_exam';

    /**
     * @return int
     */
    public function getIdExam();

    /**
     * @param int $idExam
     * @return $this
     */
    public function setIdExam($idExam);

    /**
     * @return string
     */
    public function getFirstname();

    /**
     * @param string $firstName
     * @return $this
     */
    public function setFirstname($firstName);

    /**
     * @return string
     */
    public function getLastname();

    /**
     * @param string $lastName
     * @return $this
     */
    public function setLastname($lastName);

    /**
     * @return float
     */
    public function getMark();

    /**
     * @param float $mark
     * @return $this
     */
    public function setMark($mark);

}
