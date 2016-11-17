<?php
namespace Magestore\Student\Controller\Adminhtml\Student;

use Magento\Backend\App\Action;
use Magento\TestFramework\ErrorLog\Logger;

class Save extends \Magento\Backend\App\Action
{
    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        var_dump($data);die('die');

        $data = $this->getRequest()->getParam('topics');
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($data) {

            $model = $this->_objectManager->create('Mageplaza\HelloWorld\Model\Topic');
            $imageHelper = $this->_objectManager->create('Mageplaza\HelloWorld\Helper\Image');

            $id = $data["topic_id"];
            if ($id) {
                $model->load($id);
            }

            //start block upload image
            if (isset($_FILES['image']) && isset($_FILES['image']['name']) && strlen($_FILES['image']['name']) && $model["image"] != str_replace($this->_imageHelper::MEDIA_PATH, '', $_FILES['image']['name'])) {
                /*
                * Save image upload
                */
                try {
                    $base_media_path = $imageHelper::MEDIA_PATH;
                    $uploader = $this->uploader->create(
                        ['fileId' => 'image']
                    );
                    $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                    $imageAdapter = $this->adapterFactory->create();
                    $uploader->addValidateCallback('image', $imageAdapter, 'validateUploadFile');
                    $uploader->setAllowRenameFiles(true);
                    $uploader->setFilesDispersion(false);
                    $mediaDirectory = $this->filesystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
                    $result = $uploader->save($mediaDirectory->getAbsolutePath($base_media_path));
                    // $data['image'] = $base_media_path.$result['file'];
                    // var_dump($result['name']);die('die');
                    $data['image'] = $result['name'];
                } catch (\Exception $e) {
                    if ($e->getCode() == 0) {
                        $this->messageManager->addError($e->getMessage());
                    }
                }
            } else {                
                if (isset($data['image']) && isset($data['image']['value']) && $model["image"] == str_replace($this->_imageHelper::MEDIA_PATH, '', $data['image']['value'])) {
                    if (isset($data['image']['delete'])) {
                            $data['image'] = null;
                            $data['delete_image'] = true;
                    } elseif (isset($data['image']['value'])) {
                        $data['image'] = $model["image"];
                    } else {
                        $data['image'] = null;
                    }
                }
            }

            // $model->addData($data);
            $model->setData($data);

            $this->_eventManager->dispatch(
                'helloworld_topic_prepare_save',
                ['post' => $model, 'request' => $this->getRequest()]
            );
            try {
                $model->save();
                $this->messageManager->addSuccess(__('You saved this topic.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['topic_id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the topic.'));
            }

            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['topic_id' => $this->getRequest()->getParam('topic_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}