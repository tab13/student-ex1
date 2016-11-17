<?php
 
namespace Magestore\Student\Setup;

use Magento\Eav\Setup\EavSetup; 
use Magento\Eav\Setup\EavSetupFactory /* For Attribute create  */;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\InstallSchemaInterface;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $table = $installer->getConnection()->newTable(
        $installer->getTable('student')
        )->addColumn(
                'student_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                11,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'student Id'
            )->addColumn(
                'name',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable'=>true],
                'name'
            )->addColumn(
                'class',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable'=>true],
                'class'
            )->addColumn(
                'university',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                255,
                ['nullable'=>true],
                'university'
            );        
        $installer->getConnection()->createTable($table);
        $installer->endSetup();

    }
}