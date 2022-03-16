<?php
namespace I95dev\employeeform\Setup;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
 
class InstallData implements InstallDataInterface
{
 
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
 
        $tableName = $setup->getTable('i95dev_employeeform');
        //Check for the existence of the table
        if ($setup->getConnection()->isTableExists($tableName) == true) {
            $data = [
                [
                    'name' => 'How to Speed Up Magento 2 Website',
                    'age' => 10,
                    'designation' => 'software',
                ],
                [
                      'name' => 'How to Speed Up Magento 2 Website',
                    'age' => 11,
                    'designation' => 'hardware',
                ],
                [
                   'name' => 'How to Speed Up Magento 2 Website',
                    'age' => 12,
                    'designation' => 'developer',
                ],
            ];
            foreach ($data as $item) {
                //Insert data
                $setup->getConnection()->insert($tableName, $item);
            }
        }
        $setup->endSetup();
    }
}
?>
