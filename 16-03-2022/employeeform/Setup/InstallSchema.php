<?php

namespace I95dev\employeeform\Setup;

use \Magento\Framework\Setup\InstallSchemaInterface;
use \Magento\Framework\Setup\ModuleContextInterface;
use \Magento\Framework\Setup\SchemaSetupInterface;
use \Magento\Framework\DB\Ddl\Table;


class InstallSchema implements InstallSchemaInterface
{
   
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $tableName = $setup->getTable('i95dev_employeeform');

        if ($setup->getConnection()->isTableExists($tableName) != true) {
            $table = $setup->getConnection()
                ->newTable($tableName)
                ->addColumn(
                    'id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'ID'
                )
                ->addColumn(
                    'name',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'Name'
                )
                ->addColumn(
                    'age',
                    Table::TYPE_INTEGER,
                    null,
                    ['nullable' => false],
                    'Age'
                )
                ->addColumn(
                    'designation',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false],
                    'Designation'
                )
                ->setComment('i95dev- employeeform');
            $setup->getConnection()->createTable($table);
        }

        $setup->endSetup();
    }
}
