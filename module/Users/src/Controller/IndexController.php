<?php

namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

/**
 *
 *@method indexAction()
 *@method detailAction()
 *
 *
 */

class IndexController extends AbstractActionController
{

    /**
     * Entity manager.
     * @var Doctrine\ORM\EntityManager
     */
    private $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function indexAction()
    {
        $usersEntity = $this->entityManager->getRepository(\Users\Entity\Users::class);
        $userRecs    = $usersEntity->findAll();
        $result      = [];
        foreach ($userRecs as $item) {
            $userRec                   = [];
            $userRec["id"]             = $item->getId();
            $userRec["user_status_id"] = $item->getUserStatus()->getId();
            $userRec["user_gender_id"] = $item->getUserGenderId();
            $userRec["full_name"]      = $item->getFullName();
            $userRec["phone"]          = $item->getPhone();
            $userRec["email"]          = $item->getEmail();
            $userRec["create_date"]    = $item->getCreateDate();
            $userRec["modify_date"]    = $item->getModifyDate();
            $userRec["regipaddr"]      = $item->getRegipaddr();
            $result[]                  = $userRec;
            unset($userRec);
        }

        $this->getResponse()->setStatusCode(\Zend\Http\Response::STATUS_CODE_200);
        $this->getResponse()->getHeaders()->addHeaderLine('Content-Type: application/json');

        return new JsonModel([
            'status' => true,
            'result' => $result,
        ]);
    }

    public function signinAction()
    {
        $id         = $this->params()->fromRoute("id");
        $userEntity = $this->entityManager->getRepository(\Users\Entity\Users::class);
        $result     = $userEntity->find($id);

        $userRec                   = [];
        $userRec["id"]             = $result->getId();
        $userRec["user_status_id"] = $result->getUserStatusId();
        $userRec["user_gender_id"] = $result->getUserGenderId();
        $userRec["full_name"]      = $result->getFullName();
        $userRec["phone"]          = $result->getPhone();
        $userRec["email"]          = $result->getEmail();
        $userRec["create_date"]    = $result->getCreateDate();
        $userRec["modify_date"]    = $result->getModifyDate();
        $userRec["regipaddr"]      = $result->getRegipaddr();

        return new JsonModel([
            'status' => true,
            'result' => $userRec,
        ]);
        //return new ViewModel(["userRec" => $userRec]);
    }

    public function signupAction()
    {
        $bidsEntity  = $this->entityManager->getRepository(\Bids\Entity\Bids::class);
        $loadid      = $this->_getParam("loadid");
        $bid_content = $this->_getParam("bid_content");
        if ($this->view->user["id"] > 0) {
            if (isset($loadid) && isset($bid_content)) {
                $bidsEntity->setLoadId($loadid);
                $bidsEntity->setUserId(1);
                $bidsEntity->setText($bid_content);
                $bidsEntity->setAddDate(date("Y-m-d H:i:s"));
                $bidsEntity->setIpAddr($_SERVER["REMOTE_ADDR"]);
                $bidsEntity->flush();
                $this->flashMessenger()->addSuccessMessage('<p class="green">Your bid has sended.</p>');
                return $this->redirect()->toRoute('roles', ['action' => 'index']);
            } else {
                $this->flashMessenger()->addSuccessMessage('<p class="red">Invalid params.</p>');
            }
        }
        return new JsonModel([
            'status'  => 'SUCCESS',
            'message' => 'Here is your data',
            'data'    => [
                'full_name' => 'John Doe',
                'address'   => '51 Middle st.',
            ],
        ]);
    }

}
