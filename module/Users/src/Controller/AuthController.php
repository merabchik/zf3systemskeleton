<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Users\Controller;

use Zend\Authentication\Adapter\DbTable\CredentialTreatmentAdapter as AuthAdapter;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class AuthController extends AbstractActionController
{

    /**
     * Entity manager.
     * @var Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /**
     * Constructor.
     */
    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    private function auth($email, $password)
    {
        $this->authAdapter->setIdentity($email)->setCredential($password);
        $select = $this->authAdapter->getDbSelect();
        $select->where('user_status_id = 1');
        return $this->authAdapter->authenticate();
    }

    public function doAction()
    {
        $this->getResponse()->getHeaders()->addHeaderLine('Content-Type: application/json');
        if ($this->getRequest()->isPost()) {
            $UsersEntity           = $this->entityManager->getRepository(\Users\Entity\Users::class);
            $UserPermissionsEntity = $this->entityManager->getRepository(\Users\Entity\UserPermissions::class);
            $UserSessionsEntity    = $this->entityManager->getRepository(\Users\Entity\UserSessions::class);
            $email                 = $this->params()->fromPost('email', null);
            $password              = $this->params()->fromPost('password', null);
            $UserRecord            = $UsersEntity->findOneBy(["email" => $email, "password" => $password]);

            $remote    = new \Zend\Http\PhpEnvironment\RemoteAddress;
            $IpAddress = $remote->getIpAddress(); // $this->getRequest()->getHeaders()->get('REMOTE_ADDR');
            $UserAgent = $this->getRequest()->getHeaders()->get('USER_AGENT');
            $dateNow   = new date('dd-mm-yyyy h:m:i');
            $newToken  = $this->tokenGenerator($this->getRequest());

            if ($UserRecord) {
                $Users = new \Users\Entity\Users();
                $Users->setId();
                $UserSessions = new \Users\Entity\UserSessions();
                $UserSessions->setToken($newToken);
                $UserSessions->setIpaddr($IpAddress);
                $UserSessions->setClientInfo($UserAgent);
                $UserSessions->setCreateDate($dateNow);
                $UserSessions->setUser($Users);
                $this->entityManager->persist($UserSessions);
                $this->entityManager->flush();

            } else {
                $this->getResponse()->setStatusCode(\Zend\Http\Response::STATUS_CODE_401);
                return new JsonModel([
                    'status' => false,
                    'result' => 'ელ. ფოსტა ან პაროლი არ არის სწორი',
                ]);
            }
            exit;
            $result = $this->auth($email, $password);
            if ($result->getCode() == Result::SUCCESS) {

            }

        } else {
            $this->getResponse()->setStatusCode(404);
        }
    }

    private function tokenGenerator($uniqid)
    {
        return md5(time() . $uniqid);
    }

    public function loginAction()
    {
        $request = $this->getRequest();
        if ($request->isGet()) {
            $this->getResponse()->setStatusCode(404);
        } elseif ($request->isPost()) {

            $email    = $this->params()->fromPost('email', null);
            $password = $this->params()->fromPost('password', null);
            $result   = $this->auth($email, $password);
            print_r($result);

            if (!$result->isValid()) {
                $messages = [];
                foreach ($result->getMessages() as $message) {
                    $messages[] = $message;
                }
                $this->auth->clearIdentity();
                return new JsonModel([
                    [
                        "status" => "fail",
                        "result" => [
                            "messages" => $messages,
                        ],
                    ],
                ]);
            } elseif ($this->auth->hasIdentity()) {
                return new JsonModel([
                    [
                        "status" => "ok",
                        "result" => [
                            "identity" => $result->getIdentity(),
                        ],
                    ],
                ]);
            }
        }
    }

    public function checkAction()
    {
        $this->getResponse()->getHeaders()->addHeaderLine('Content-Type: application/json');
        if ($this->getRequest()->isPost()) {
            $pToken             = $this->params()->fromPost('token', null);
            $UserSessionsEntity = $this->entityManager->getRepository(\Users\Entity\UserSessions::class)->findBy(["token" => $pToken]);
            $output             = [];
            foreach ($UserSessionsEntity as $item) {
                $output[] = [
                    "u_id"       => $item->getUser()->getId(),
                    "token"      => $item->getToken(),
                    "Ipaddr"     => $item->getIpaddr(),
                    "clientinfo" => $item->getClientInfo(),
                    "created"    => $item->getCreateDate(),
                ];
            }
            echo json_encode($output);
            exit;
            $pToken             = $this->params()->fromPost('token', null);
            $UserSessionsRecord = $UserSessionsEntity;
            $lToken             = $UserSessionsRecord->getToken();
            if ($pToken == $lToken) {
                $this->getResponse()->setStatusCode(\Zend\Http\Response::STATUS_CODE_200); //OK
                return new JsonModel([
                    'status' => true,
                    'result' => $pToken,
                ]);
            } else {
                $this->getResponse()->setStatusCode(\Zend\Http\Response::STATUS_CODE_401); //Unauthorized
                return new JsonModel([
                    'status' => false,
                    'result' => 'Unauthorized',
                ]);
            }
        } else {
            $this->getResponse()->setStatusCode(\Zend\Http\Response::STATUS_CODE_405); //Method Not Allowed
            return new JsonModel([
                'status' => false,
                'result' => 'Method Not Allowed',
            ]);
        }
    }

}
