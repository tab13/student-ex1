<?php
namespace Magestore\Student\Api;
 /**
 * @api
 */
interface StudentRepositoryInterface
{
	/**
     * Create student service
     *
     * @param \Magestore\Student\Api\Data\StudentInterface $student
     * @return \Magestore\Student\Api\Data\StudentInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save($student);

    /**
     * Get info about student by student id
     *
     * @param int $studentId
     * @return \Magestore\Student\Api\Data\StudentInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function get($studentId);

    /**
     * Delete student
     *
     * @param \Magestore\Student\Api\Data\StudentInterface $student student which will deleted
     * @return bool Will returned True if deleted
     * @throws \Magento\Framework\Exception\InputException
     * @throws \Magento\Framework\Exception\StateException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function delete(\Magestore\Student\Api\Data\StudentInterface $student);
}