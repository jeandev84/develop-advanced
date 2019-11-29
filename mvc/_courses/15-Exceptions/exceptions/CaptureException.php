<?php

/**
 * Class DbException
*/
class DbException extends Exception {}


/**
 * Class FileSystemException
*/
class FileSystemException extends Exception {}


/*
 Testing
*/

try {

} catch (DbException $e) {

    // обработка исключений, связанных с базой данных

} catch (FileSystemException $e) {

    // обработка исключений, связанных с файловой системой
}
