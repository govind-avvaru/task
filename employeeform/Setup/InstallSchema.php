<?php

namespace I95Dev\Form\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\App\Filesystem\DirectoryList;

class InstallSchema implements InstallSchemaInterface
{
    
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;

        $installer->startSetup();
        $nullableIndex='nullable';

        $table = $installer->getConnection()->newTable(
            $installer->getTable('i95dev_Form_Details')
        )->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, $nullableIndex => false, 'primary' => true],
            'Id'
        )->addColumn(
            'Date_Of_Birth',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATE,
            255,
            [$nullableIndex => false],
            'Date Of Birth'
        )->addColumn(
            'Full_Name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [$nullableIndex => false],
            'Full Name'
        )->addColumn(
            'MobileNo',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            [$nullableIndex => false],
            'Mobile Number'
        )->addColumn(
            'Email',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'Email'
        )->addColumn(
            'Area',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'Area'
        )->addColumn(
            'Team_Name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'Team Name'
        )->addColumn(
            'Team_Captain_Name',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            null,
            [],
            'Team Captain Name'
        )->setComment(
            'Row Data Table'
        );

        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}
