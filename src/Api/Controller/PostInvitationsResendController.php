<?php namespace App\Api\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Business\Async\Message\SendInvitationMessage;

/**
 * @Route(
 *     "/async/bulk/invitations/send",
 *     name="api_async_bulk_invitations_send_post",
 *     methods={"POST"}
 * )
 */
class PostInvitationsResendController extends AbstractController
{
    private MessageBusInterface $bus;

    public function __construct(
        MessageBusInterface $bus
    ) {
        $this->bus = $bus;
    }

    public function __invoke(Request $request): Response {
        $data = json_decode($request->getContent(), false);
        foreach ($data as $row) {
            $message = (new SendInvitationMessage())->setId($row->id)->setMessage('You have been invited to join our awesome organization');
            $this->bus->dispatch($message);
            // file_put_contents(__DIR__.'/../../../var/log/post_invitations.log', $row->id . "\n", FILE_APPEND);
        }
        return JsonResponse::create($data);
    }
}