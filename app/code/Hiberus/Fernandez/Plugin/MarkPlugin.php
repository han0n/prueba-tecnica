<?php

namespace Hiberus\Fernandez\Plugin;

use \Hiberus\Fernandez\Model\Exam;

class MarkPlugin
{

    public function afterGetMark(Exam $subject, $result ):float
    {
        if ($subject->getData('mark') < 5){
            $result = 4.9;
        }

        return $result;
    }


}
