<?php

namespace Smile\ProductLabel\Controller\Adminhtml\ProductLabel;

use Magento\Framework\Controller\Result\Redirect as ResultRedirect;
use Magento\Framework\Controller\ResultFactory;

/**
 *  Admin Action: productlabel/massDelete
 *
 * @category  Smile
 * @package   Smile\ProductLabel
 * @author    Houda EL RHOZLANE <hoelr@smile.fr>
 * @copyright 2019 Smile
 */
class MassDelete extends AbstractAction
{

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $collection     = $this->filter->getCollection($this->collectionFactory->create());
        $collectionSize = $collection->getSize();

        foreach ($collection as $productLabel) {
            $this->modelRepository->deleteById($productLabel->getId());
        }

        $this->messageManager->addSuccessMessage(__('A total of %1 product label(s) have been deleted.', $collectionSize));

        $resultRedirect = $this->resultRedirectFactory->create();

        return $resultRedirect->setPath('*/*/');

        return $resultRedirect;
    }
}