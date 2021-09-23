<?php

namespace Hiberus\Fernandez\Setup;

use \Magento\Framework\Setup\InstallSchemaInterface;
use \Magento\Framework\Setup\ModuleContextInterface;
use \Magento\Framework\Setup\SchemaSetupInterface;
use \Magento\Framework\DB\Ddl\Table;


class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $tableName = $setup->getTable('hiberus_exam');

        if ($setup->getConnection()->isTableExists($tableName) != true) {
            $table = $setup->getConnection()
                ->newTable($tableName)
                ->addColumn(
                    'id_exam',
                    Table::TYPE_INTEGER,
                    11,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'ID'
                )
                ->addColumn(
                    'firstname',
                    Table::TYPE_TEXT,
                    100,
                    ['nullable' => false],
                    'FirstName'
                )
                ->addColumn(
                    'lastname',
                    Table::TYPE_TEXT,
                    250,
                    ['nullable' => false],
                    'LastName'
                )
                ->addColumn(
                    'mark',
                    Table::TYPE_DECIMAL,
                    '4,2',
                    ['nullable' => false],
                    'Mark'
                )
                ->setComment('Fernandez - Exam');
            $setup->getConnection()->createTable($table);
        }

        $setup->endSetup();
    }
}
