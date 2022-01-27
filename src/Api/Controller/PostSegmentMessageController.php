<?php namespace App\Api\Controller;

use App\Business\Async\Message\SegmentMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(
 *     "/segment/send",
 *     name="api_segment_send_post",
 *     methods={"POST"}
 * )
 */
class PostSegmentMessageController extends AbstractController
{
    private MessageBusInterface $bus;

    public function __construct(
        MessageBusInterface $bus
    ) {
        $this->bus = $bus;
    }

    public function __invoke(Request $request): Response {
        $message = (new SegmentMessage())->setUserId('SomeUserId')->setType(SegmentMessage::SEGMENT_TYPE_TRACK)->setEventName('SomeAwesomeEvent');
        $this->bus->dispatch($message);
        return JsonResponse::create(null, 200);
    }
}