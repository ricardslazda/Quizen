<?php


namespace Quiz;


use mysql_xdevapi\Exception;

/**
 * Class Route
 * @package Quiz
 */
class Route
{
    /**
     *
     */
    const METHOD_GET = "GET";
    /**
     *
     */
    const METHOD_POST = "POST";
    /**
     *
     */
    const ALLOWED_METHODS = [self::METHOD_GET, self::METHOD_POST];
    /**
     * @var string
     */
    private $className;
    /**
     * @var string
     */
    private $functionName;
    /**
     * @var
     */
    private $method;

    /**
     * Route constructor.
     * @param string $className
     * @param string $functionName
     * @param string $method
     * @throws \Exception
     */
    public function __construct(string $className, string $functionName, string $method = Route::METHOD_GET)
    {
        if(!in_array($method, self::ALLOWED_METHODS)){
            throw new \Exception('Method invalid!');
        }
        $this->className = $className;
        $this->functionName = $functionName;
        $this->method = trim(strtoupper($method));
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function call(){
        $method = $this->getRequestMethod();
        if($method !== $this->method) {
            throw new \Exception("Method not allowed! Expected " . $this->method . ", Actual " . $method);
        }

        $classInstance = new $this->className;
        if(!method_exists($classInstance, $this->functionName)) {
            throw new \Exception('Method does not exist!');
        };
        return call_user_func([$classInstance, $this->functionName]);
    }

    /**
     * @return string
     */
    private function getRequestMethod() : string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

}