<?php
namespace Magestore\Student\Model\ResourceModel;

class Student extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	/**
	 * mysql resource
	 */
	protected function _construct()
	{
		$this->_init('student', 'student_id');
	}
}