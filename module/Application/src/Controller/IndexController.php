<?php

namespace Application\Controller;

use Application\Entity as Entity;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

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

        $UsersEntity           = $this->entityManager->getRepository(Entity\Users::class);
        $UserPermissionsEntity = $this->entityManager->getRepository(Entity\UserPermissions::class);
        $UserSessionsEntity    = $this->entityManager->getRepository(Entity\UserSessions::class);
        //$this->params()->fromQuery('var_name', 'default_val'); GET
        $pToken             = $this->params()->fromPost('token', null);
        $UserSessionsRecord = $UserSessionsEntity->find(['token' => $token]);
        $lToken             = $UserSessionsRecord->getToken();
        if ($pToken == $lToken) {
            $this->getResponse()->setStatusCode(200);
            $this->getResponse()->setReasonPhrase([
                'status' => true,
                'result' => true,
            ]);
        } else {
            $this->getResponse()->setStatusCode(401);
            $this->getResponse()->setReasonPhrase([
                'status' => true,
                'result' => false,
            ]);
        }
        exit;

        $result = [];
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

        $this->getResponse()->setStatusCode(200);
        $this->getResponse()->setReasonPhrase([
            'status' => true,
            'result' => $result,
        ]);

        /*return new JsonModel([
    'status' => true,
    'result' => $result
    ]);*/
    }

    public function detailAction()
    {
        $id         = $this->params()->fromRoute("id");
        $userEntity = $this->entityManager->getRepository(Entity\Users::class);
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

    public function sendapplyAction()
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

    public function langsAction()
    {
        $Entity      = $this->entityManager->getRepository(Entity\Langs::class);
        $langsEntity = $Entity->findAll();
        $result      = [];
        foreach ($langsEntity as $item) {
            $langs              = [];
            $langs["id"]        = $item->getId();
            $langs["lang_code"] = $item->getLangCode();
            $langs["icon"]      = $item->getIcon();
            $langs["default"]   = $item->getDefault();
            $langs["status"]    = $item->getStatus();
            $langs["pos"]       = $item->getPos();
            $result[]           = $langs;
            unset($langs);
        }

        return new JsonModel([
            'status' => true,
            'result' => $result,
        ]);
    }

    public function wordsAction()
    {
        $id               = $this->params()->fromRoute("id");
        $Entity           = $this->entityManager->getRepository(Entity\LangsWords::class);
        $LangswordsEntity = $Entity->find(["lang_id" => $id]);
        $result           = [];
        foreach ($LangswordsEntity as $item) {
            $words              = [];
            $words["id"]        = $item->getId();
            $words["lang_code"] = $item->getLangsWordsGroupId();
            $words["icon"]      = $item->getWord();
            $words["default"]   = $item->getDefineWord();
            $words["status"]    = $item->getLangId();
            $result[]           = $words;
            unset($words);
        }

        return new JsonModel([
            'status' => true,
            'result' => $result,
        ]);
    }

    public function reqAction()
    {
        $url    = "http://localhost:8080/post.php";
        $params = ["id" => 1, "title" => "test"];
        $result = $this->sendJsonBodyByPost($url, $params);
        return new JsonModel([
            'status' => true,
            "result" => $result,
        ]);
    }

    public function postdataAction()
    {
        return new JsonModel([
            'post' => $_POST,
        ]);
    }

    private function sendJsonBodyByPost($pUrl, $pParams = [])
    {
        try {
            $ch              = curl_init($pUrl);
            $jsonDataEncoded = json_encode($pParams);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            return curl_exec($ch);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    private function sendJsonBodyByPost2($pUrl, $pParams = [])
    {
        try {
            $options = array(
                'http' => array(
                    'method'  => 'POST',
                    'content' => json_encode($pParams),
                    'header'  => "Content-Type: application/json\r\n" .
                    "Accept: application/json\r\n",
                ),
            );
            $context  = stream_context_create($options);
            $result   = file_get_contents($pUrl, false, $context);
            $response = json_decode($result);
            return $response;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    private function sendJsonBodyByPost3($pUrl, $pParams = [])
    {
        $url     = $pUrl;
        $content = json_encode($pParams);
        $curl    = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array("Content-type: application/json"));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $content);
        $json_response = curl_exec($curl);
        $status        = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if ($status != 201) {
            die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
        }
        curl_close($curl);
        $response = json_decode($json_response, true);
        return $response;
    }

}
