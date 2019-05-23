<?php
/**
 * Created by IntelliJ IDEA.
 * User: ADMINIBM
 * Date: 25/04/2019
 * Time: 23:48
 */

namespace App\Event;


use App\Entity\User;

class UserRegisterEvent
{
    const NAME = 'user.register';
    /**
     * @var User
     */
    private $registeredUser;
    public function __construct(User $registeredUser)
    {
        $this->registeredUser = $registeredUser;
    }

    /**
     * @return User
     */
    public function getRegisteredUser(): User
    {
        return $this->registeredUser;
    }


}
