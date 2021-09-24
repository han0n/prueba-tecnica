<?php

namespace Hiberus\Fernandez\Model\ResourceModel\Exam;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'Hiberus\Fernandez\Model\Exam',
            'Hiberus\Fernandez\Model\ResourceModel\Exam'
        );
    }
}
