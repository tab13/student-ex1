<?php
namespace Magestore\Student\Controller\Index;

use Magento\Backend\App\Action;
use Magento\TestFramework\ErrorLog\Logger;

class Save extends \Magento\Framework\App\Action\Action
{
    protected $_studentRepo;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magestore\Student\Model\StudentRepository $studentRepo
        )
    {
        $this->_studentRepo = $studentRepo;
        parent::__construct($context);
    }
    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        $resultRedirect = $this->resultRedirectFactory->create();
        $check = $this->_studentRepo->save($data);
        if ($check) {
            $this->messageManager->addSuccess(__('You saved this student.'));
            return $resultRedirect->setPath('*/*/');
        }
        return $resultRedirect->setPath('*/*/');
    }
}