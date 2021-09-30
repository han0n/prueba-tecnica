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

        if ($context->getVersion() && version_compare($context->getVersion(), '1.2.5') < 0
        ) {
            $tableName = $setup->getTable('hiberus_exam');

            $data = [
                [
                    'firstname' => 'Carlos',
                    'lastname' => 'Fernández',
                ],
                [
                    'firstname' => 'Carlos Gabriel',
                    'lastname' => 'Jiménez',
                ],
                [
                    'firstname' => 'Tamara',
                    'lastname' => 'Armingol',
                ],
                [
                    'firstname' => 'Toni',
                    'lastname' => 'Varela',
                ],
                [
                    'firstname' => 'Javier',
                    'lastname' => 'Soto',
                ],
                [
                    'firstname' => 'Homer',
                    'lastname' => 'Simpson',
                ],
                [
                    'firstname' => 'Bob',
                    'lastname' => 'Esponja',
                ],
            ];

            //Generación de decimales del 0.00 al 10.00
            foreach ($data as $key => $value) {
                $data[$key]['mark'] = rand(0, 1000)/100;
            }

            $setup
                ->getConnection()
                ->insertMultiple($tableName, $data);
        }

        $setup->endSetup();
    }
}
