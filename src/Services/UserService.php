<?php


namespace Quiz\Services;


use Quiz\Models\UserModel;
use Quiz\Repositories\UserRepository;
use Quiz\Session;

/**
 * Class UserService
 * @package Quiz\Services
 */
class UserService
{
    private $session;

    public function __construct(UserRepository $userRepo = null, Session $session = null)
    {
        $this->userRepo = $userRepo ?? new UserRepository();
        $this->session = $session ?? Session::getInstance();
    }

    public function createUser(string $name)
    {
        if (strlen($name) < 4) {
            throw new \Exception('Name is not valid');
        }
        $user = $this->userRepo->create(['name' => $name]);
        $this->session->set('name', $name);
        return $user;
    }
}