<?php
namespace I95dev\FormDetails\Setup;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
 
class InstallData implements InstallDataInterface
{
 
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
 
        $tableName = $setup->getTable('i95dev_User_Details');
        //Check for the existence of the table
        if ($setup->getConnection()->isTableExists($tableName) == true) {
            $data = [
                [
                      'Full_Name' => 'hello world',
                    'MobileNo' => 7898989876,
                    'Area' => 'hyd',
                    'Team_Name' => 'ramteam',
                    'Team_Captain_Name' => 'ram',
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