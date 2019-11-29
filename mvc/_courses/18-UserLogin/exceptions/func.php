<?php


/*
 Function Throw Exception DB
*/
function func1()
{
    // какой-то код
    func2();
}

function func2()
{
    try
    {
        // какой-то код
        func3();

    } catch(Exception $e) {

        echo 'Было поймано исключение: ' . $e->getMessage() .'<br>';
    }
}

func1();

function func3()
{
    // код, в котором возможна исключительная ситуация
    throw new Exception('Ошибка при подключении к БД');
}