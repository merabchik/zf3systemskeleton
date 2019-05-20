<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notifications
 *
 * @ORM\Table(name="notifications", indexes={@ORM\Index(name="notification_type_id", columns={"notification_type_id"}), @ORM\Index(name="user_id", columns={"user_id"}), @ORM\Index(name="action_id", columns={"action_id"}), @ORM\Index(name="executed", columns={"executed"})})
 * @ORM\Entity
 */
class Notifications
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int|null
     *
     * @ORM\Column(name="offer_user_id", type="integer", nullable=true)
     */
    private $offerUserId = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="app_offer_id", type="integer", nullable=true)
     */
    private $appOfferId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="goto_url_segment", type="string", length=255, nullable=true)
     */
    private $gotoUrlSegment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fire_time", type="datetime", nullable=false)
     */
    private $fireTime;

    /**
     * @var int|null
     *
     * @ORM\Column(name="executed", type="integer", nullable=true)
     */
    private $executed = '0';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="create_date", type="datetime", nullable=true)
     */
    private $createDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="executed_date", type="datetime", nullable=true)
     */
    private $executedDate;

    /**
     * @var \Application\Entity\NotificationTypes
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\NotificationTypes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="notification_type_id", referencedColumnName="id")
     * })
     */
    private $notificationType;

    /**
     * @var \Application\Entity\NotificationActions
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\NotificationActions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="action_id", referencedColumnName="id")
     * })
     */
    private $action;

    /**
     * @var \Application\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;



    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set offerUserId.
     *
     * @param int|null $offerUserId
     *
     * @return Notifications
     */
    public function setOfferUserId($offerUserId = null)
    {
        $this->offerUserId = $offerUserId;

        return $this;
    }

    /**
     * Get offerUserId.
     *
     * @return int|null
     */
    public function getOfferUserId()
    {
        return $this->offerUserId;
    }

    /**
     * Set appOfferId.
     *
     * @param int|null $appOfferId
     *
     * @return Notifications
     */
    public function setAppOfferId($appOfferId = null)
    {
        $this->appOfferId = $appOfferId;

        return $this;
    }

    /**
     * Get appOfferId.
     *
     * @return int|null
     */
    public function getAppOfferId()
    {
        return $this->appOfferId;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Notifications
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description.
     *
     * @param string|null $description
     *
     * @return Notifications
     */
    public function setDescription($description = null)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set gotoUrlSegment.
     *
     * @param string|null $gotoUrlSegment
     *
     * @return Notifications
     */
    public function setGotoUrlSegment($gotoUrlSegment = null)
    {
        $this->gotoUrlSegment = $gotoUrlSegment;

        return $this;
    }

    /**
     * Get gotoUrlSegment.
     *
     * @return string|null
     */
    public function getGotoUrlSegment()
    {
        return $this->gotoUrlSegment;
    }

    /**
     * Set fireTime.
     *
     * @param \DateTime $fireTime
     *
     * @return Notifications
     */
    public function setFireTime($fireTime)
    {
        $this->fireTime = $fireTime;

        return $this;
    }

    /**
     * Get fireTime.
     *
     * @return \DateTime
     */
    public function getFireTime()
    {
        return $this->fireTime;
    }

    /**
     * Set executed.
     *
     * @param int|null $executed
     *
     * @return Notifications
     */
    public function setExecuted($executed = null)
    {
        $this->executed = $executed;

        return $this;
    }

    /**
     * Get executed.
     *
     * @return int|null
     */
    public function getExecuted()
    {
        return $this->executed;
    }

    /**
     * Set createDate.
     *
     * @param \DateTime|null $createDate
     *
     * @return Notifications
     */
    public function setCreateDate($createDate = null)
    {
        $this->createDate = $createDate;

        return $this;
    }

    /**
     * Get createDate.
     *
     * @return \DateTime|null
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Set executedDate.
     *
     * @param \DateTime|null $executedDate
     *
     * @return Notifications
     */
    public function setExecutedDate($executedDate = null)
    {
        $this->executedDate = $executedDate;

        return $this;
    }

    /**
     * Get executedDate.
     *
     * @return \DateTime|null
     */
    public function getExecutedDate()
    {
        return $this->executedDate;
    }

    /**
     * Set notificationType.
     *
     * @param \Application\Entity\NotificationTypes|null $notificationType
     *
     * @return Notifications
     */
    public function setNotificationType(\Application\Entity\NotificationTypes $notificationType = null)
    {
        $this->notificationType = $notificationType;

        return $this;
    }

    /**
     * Get notificationType.
     *
     * @return \Application\Entity\NotificationTypes|null
     */
    public function getNotificationType()
    {
        return $this->notificationType;
    }

    /**
     * Set action.
     *
     * @param \Application\Entity\NotificationActions|null $action
     *
     * @return Notifications
     */
    public function setAction(\Application\Entity\NotificationActions $action = null)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action.
     *
     * @return \Application\Entity\NotificationActions|null
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set user.
     *
     * @param \Application\Entity\Users|null $user
     *
     * @return Notifications
     */
    public function setUser(\Application\Entity\Users $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return \Application\Entity\Users|null
     */
    public function getUser()
    {
        return $this->user;
    }
}
