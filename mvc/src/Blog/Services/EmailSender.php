<?php
namespace Blog\Services;


use Blog\Models\Users\User;

/**
 * Class EmailSender
 * @package Blog\Models\Services
*/
class EmailSender
{

    /**
     * @param User $receiver
     * @param string $subject
     * @param string $templateName
     * @param array $templateVars
    */
    public static function send(
        User $receiver,
        string $subject,
        string $templateName,
        array $templateVars = []
    ): void {
        extract($templateVars);

        ob_start();
        require __DIR__ . '/../../../templates/blog/mail/' . $templateName;
        $body = ob_get_contents();
        ob_end_clean();

        mail($receiver->getEmail(), $subject, $body, 'Content-Type: text/html; charset=UTF-8');
    }
}