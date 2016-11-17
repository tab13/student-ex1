<?php
namespace Magestore\Student\Model;

class StudentRepository implements \Magestore\Student\Api\StudentRepositoryInterface
{
	protected $_studentFactory;
	protected $_studentResource;

	public function __contruct(
			\Magestore\Student\Model\StudentFactory $studentFactory,
			\Magestore\Student\Model\ResourceModel $studentResource
		)
	{
		$this->_studentFactory = $studentFactory;
		$this->_studentResource = $studentResource;
	}

    public function save($student)
    {
    	if ($student) {

            $model = $this->_studentFactory->create();

            // $model->addData($data);
            $model->setName($student["name"]);
            $model->setClass($student["class"]);
            $model->setUniversity($student["university"]);

            try {
                $model->save();
                $this->messageManager->addSuccess(__('You saved this student.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the student.'));
            }
            return 1;
        }
        return 1;
    }

    public function get($studentId)
    {

    }

    public function delete(\Magestore\Student\Api\Data\StudentInterface $student)
    {

    }
}