<?php


namespace Quiz;


use mysql_xdevapi\Exception;

/**
 * Class Session
 * @package Quiz
 */
class Session
{
    /**
     * @var
     */
    protected static $instance;
    /**
     * @var
     */
    protected $sessionId;

    /**
     * Session constructor.
     */
    public function __construct()
    {
        $this->start();
    }

    /**
     * @return Session
     */
    public static function getInstance()
    {
        if(!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     *
     */
    public function start() : void {
        if($this->sessionId){
            return;
        }

        $success = session_start();

        if(!$success) {
            throw new Exception('Session could not be initialized');
        }
        $this->sessionId = session_id();
    }

    /**
     * @param string $key
     * @param $value
     */
    public function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    public function get(string $key)
    {
        return $_SESSION[$key] ?? null;
    }

    public function unset(string $key)
    {
        unset($_SESSION[$key]);
    }
}