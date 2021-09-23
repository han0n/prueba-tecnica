<?php

namespace Hiberus\Fernandez\Setup;

use \Magento\Framework\Setup\UpgradeDataInterface;
use \Magento\Framework\Setup\ModuleContextInterface;
use \Magento\Framework\Setup\ModuleDataSetupInterface;


class UpgradeData implements UpgradeDataInterface
{

    /**
     * Crea registros de muestra a la tabla hiberus_exam
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if ($context->getVersion() && version_compare($context->getVersion(), '1.1.8') < 0
        ) {
            $tableName = $setup->getTable('hiberus_exam');

            $data = [
                [
                    'firstname' => 'Carlos',
                    'lastname' => 'Fernández',
                    'mark' => 8,
                ],
                [
                    'firstname' => 'Carlos Gabriel',
                    'lastname' => 'Jiménez',
                    'mark' => 9.55,
                ],
                [
                    'firstname' => 'Tamara',
                    'lastname' => 'Armingol',
                    'mark' => 9.09,
                ],
                [
                    'firstname' => 'Toni',
                    'lastname' => 'Varela',
                    'mark' => 10,
                ],
                [
                    'firstname' => 'Javier',
                    'lastname' => 'Soto',
                    'mark' => 6.66,
                ],
                [
                    'firstname' => 'Homer',
                    'lastname' => 'Simpson',
                    'mark' => 2.40,
                ],
                [
                    'firstname' => 'Bob',
                    'lastname' => 'Esponja',
                    'mark' => 1.99,
                ],
            ];

            $setup
                ->getConnection()
                ->insertMultiple($tableName, $data);
        }

        $setup->endSetup();
    }
}
