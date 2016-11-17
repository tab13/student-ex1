<?php
namespace Magestore\Student\Block;

use Mageplaza\HelloWorld\Api\Data\TopicInterface as TopicInterface;
use Mageplaza\HelloWorld\Model\ResourceModel\Topic\Collection as TopicCollection;

class Student extends \Magento\Framework\View\Element\Template implements
    \Magento\Framework\DataObject\IdentityInterface  
{
	/**
     * Return identifiers for produced content
     *
     * @return array
     */
    public function getIdentities()
    {
        return [\Mageplaza\HelloWorld\Model\Post::CACHE_TAG . '_' . 'addstudent'];
    }
}