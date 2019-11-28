<?php
namespace App\Blog\Services;


use App\Blog\Models\Users\User;
use Framework\Services\Database\Db;


/**
 * Class UserActivationService
 * @package App\Blog\Models\Services
 */
class UserActivationService
{
    /** @var string  */
    private const TABLE_NAME = 'users_activation_codes';


    /**
     * @param User $user
     * @return string
     * @throws \Framework\Exceptions\Database\DbException
    */
    public static function createActivationCode(User $user): string
    {
        // Генерируем случайную последовательность символов, о функциях почитайте в документации
        $code = bin2hex(random_bytes(16));

        $db = Db::getInstance();
        $db->query(
            'INSERT INTO ' . self::TABLE_NAME . ' (user_id, code) VALUES (:user_id, :code)',
            [
                'user_id' => $user->getId(),
                'code' => $code
            ]
        );

        return $code;
    }


    /**
     * @param User $user
     * @param string $code
     * @return bool
     * @throws \Framework\Exceptions\Database\DbException
    */
    public static function checkActivationCode(User $user, string $code): bool
    {
        $db = Db::getInstance();
        $result = $db->query(
            'SELECT * FROM ' . self::TABLE_NAME . ' WHERE user_id = :user_id AND code = :code',
            [
                'user_id' => $user->getId(),
                'code' => $code
            ]
        );
        return !empty($result);
    }


}