<?php
namespace Magestore\Student\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
        )
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    /**
     * 
     *
     * @return \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
        $resultpage = $this->_pageFactory->create();

        return $resultpage;
    }
}
?>