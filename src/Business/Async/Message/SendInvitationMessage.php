<?php namespace App\Business\Async\Message;

class SendInvitationMessage {

    protected int $id;

    protected string $message;

    public function setId(int $id): SendInvitationMessage {
        $this->id = $id;
        return $this;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setMessage(string $message): SendInvitationMessage {
        $this->message = $message;
        return $this;
    }

    public function getMessage(): string {
        return $this->message;
    }
}