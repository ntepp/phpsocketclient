# Real time(SOCKET) communication in PHP 

The goal of this project is to give developers a quick start to integrate instant communication into their PHP application.

### Client Socket in PHP

The use of this module required **PHP 5+**, you do not need any particular labrairy installed.

#### Code

The class ```Client.php``` containt all the methods required for socket `connection`, `write`, `read`, `close` communication. 

#### Run

In your program use the fallowing code with your message.
```
$host = "127.0.0.1";
$port = "2018";
$message1 = "Hello Guy";
$message2 = "Duo Code";
$client = new Client($host, $port);
$client->openConnection();
$client->write($message1);
$client->read();
$client->write($message2);
$client->close();
```
