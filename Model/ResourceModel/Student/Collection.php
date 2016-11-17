<?php
namespace Magestore\Student\Model\ResourceModel\Student;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected function _construct()
	{		
		$this->_init('Magestore\Student\Model\Student', 'Magestore\Student\Model\ResourceModel\Student');
	}
}