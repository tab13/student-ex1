<?php
namespace Magestore\Student\Model;

class Student extends \Magento\Framework\Model\AbstractModel implements \Magestore\Api\Data\StudentInterface
{
	/**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {        
        $this->_init('Magestore\Student\Model\ResourceModel\Student');
    }

    /**
	 * GET student id
	 *
	 * @return int|null
	 */
	public function getStudentId()
	{
		return $this->getData(self::STUDENT_ID);
	}
	/**
	 * Set student id
	 * @param int $studentId
	 * @return \Magestore\Student\Api\Data\StudentInterface
	 */
	public function setStudentId($studentId)
	{
		return $this->setData(self::STUDENT_ID,$studentId);
	}
	/**
	 * GET name
	 *
	 * @return string|null
	 */
	public function getName()
	{
		return $this->getData(self::NAME);
	}
	/**
	 * Set name
	 * @param string $name
	 * @return \Magestore\Student\Api\Data\StudentInterface
	 */
	public function setName($name)
	{
		return $this->setData(self::NAME,$name);
	}
	/**
	 * Get class
	 * @return string|null
	 */
	public function getClass()
	{
		return $this->getData(self::STUDENT_CLASS);
	}
	/**
	 * Set class
	 * @param string $class
	 * @return \Magestore\Student\Api\Data\StudentInterface
	 */
	public function setClass($class)
	{
		return $this->setData(self::STUDENT_CLASS,$class);
	}
	/**
	 * Get university
	 * @return string|null
	 */
	public function getUniversity()
	{
		return $this->getData(self::UNIVERSITY);
	}
	/**
	 * Set university
	 * @param string $university
	 * @return \Magestore\Student\Api\Data\StudentInterface
	 */
	public function setUniversity($university)
	{
		return $this->setData(self::UNIVERSITY,$university);
	}
}