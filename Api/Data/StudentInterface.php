<?php
namespace Magestore\Student\Api\Data;
interface StudentInterface
{
	/**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
	const STUDENT_ID = 'student_id';
	const NAME = 'name';
	const STUDENT_CLASS = 'class';
	const UNIVERSITY = 'university';

	/**
	 * GET student id
	 *
	 * @return int|null
	 */
	public function getStudentId();
	/**
	 * Set student id
	 * @param int $studentId
	 * @return \Magestore\Student\Api\Data\StudentInterface
	 */
	public function setStudentId($studentId);
	/**
	 * GET name
	 *
	 * @return string|null
	 */
	public function getName();
	/**
	 * Set name
	 * @param string $name
	 * @return \Magestore\Student\Api\Data\StudentInterface
	 */
	public function setName($name);
	/**
	 * Get class
	 * @return string|null
	 */
	public function getClass();
	/**
	 * Set class
	 * @param string $class
	 * @return \Magestore\Student\Api\Data\StudentInterface
	 */
	public function setClass($class);
	/**
	 * Get university
	 * @return string|null
	 */
	public function getUniversity();
	/**
	 * Set university
	 * @param string $university
	 * @return \Magestore\Student\Api\Data\StudentInterface
	 */
	public function setUniversity($university);
}