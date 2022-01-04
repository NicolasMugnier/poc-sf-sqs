<?php namespace App\Business\Async\Handler;

use App\Business\Async\Message\SendInvitationMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SendInvitationHandler implements MessageHandlerInterface
{
    public function __invoke(SendInvitationMessage $message): void
    {
        file_put_contents(
            __DIR__.'/../../../../var/log/post_invitations.log',
            date('Y-m-d H:i:s') . ',' . $message->getId() . ',' . $message->getMessage() . "\n",
            FILE_APPEND
        );
    }
}