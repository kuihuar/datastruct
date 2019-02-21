<?php
/**
 * Created by PhpStorm.
 * User: jianfenliu
 * Date: 2019/2/21
 * Time: 下午12:00
 */

abstract class Log{
    abstract function writeLog();
}

class FileLog extends Log{
    function writeLog()
    {
        // TODO: Implement writeLog() method.
        echo "write log to file\r\n";
    }
}
class DatabasesLog extends Log{
    function writeLog()
    {
        // TODO: Implement writeLog() method.
        echo "write log to databases\r\n";
    }
}

abstract class LogFactory{
    abstract function createLog();
}
class FileLogFactory extends LogFactory{
    function createLog() : Log
    {
        // TODO: Implement createLog() method.
        return new FileLog();
    }
}
class DatabaseLogFactory extends LogFactory{
    function createLog() :Log
    {
        // TODO: Implement createLog() method.
        return new DatabasesLog();
    }
}

$fileLogFactory = new FileLogFactory();
$fileLog = $fileLogFactory->createLog();
$fileLog->writeLog();

$databaseLogFactory = new DatabaseLogFactory();
$databaseLog = $databaseLogFactory->createLog();
$databaseLog->writeLog();