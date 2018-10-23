<?php
require_once ("WorkerThread.php");
error_reporting(E_ALL);
Class Client
{
    private $host;
    private $port;
    private $socketInstance;
    private $socket;

    public function __construct($host, $port)
    {
        $this->host = $host;
        $this->port = $port;
        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    }

    public function openConnection(){
        if ($this->socket === false) {
            echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
            return "error";
        }else{
            $this->socketInstance = socket_connect($this->socket, $this->host, $this->port);
           return $this->socket;
        }
    }

    public function write($message){
        try{
            socket_write($this->socket, $message, strlen($message));
            echo "<br>message: ".$message;
            return "ok";
        }catch (Exception $e){
            echo $e->getMessage();
            echo $e->getTraceAsString();
            return "error";
        }
    }

    public function read(){
        try{

            while ($out = socket_read($this->socket, 2048)) {
                //echo "<br>Received123: ".$out;
                return $out;
            }
        }catch (Exception $e){
            echo $e->getMessage();
            echo $e->getTraceAsString();
            return "error";
        }

    }

    public function close(){
        try{
            socket_close($this->socket);
            echo "<br> connection closed";
            return "ok";
        }catch (Exception $e){
            echo $e->getMessage();
            echo $e->getTraceAsString();
            return "error";
        }
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param mixed $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param mixed $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @return mixed
     */
    public function getSocket()
    {
        return $this->socketInstance;
    }

    /**
     * @param mixed $socket
     */
    public function setSocket($socket)
    {
        $this->socketInstance = $socket;
    }
}

