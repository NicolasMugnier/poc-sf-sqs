<?php namespace App\Business\Async\Message;

class SegmentMessage {

    const SEGMENT_TYPE_IDENTITY = 'identity';

    const SEGMENT_TYPE_TRACK = 'track';

    protected string $type;

    protected array $properties = [];

    protected string $userId = '';

    protected string $eventName = '';

    public function getBody(): string {
        return json_encode(
            [
                'type' => $this->getType(),
                'userId' => $this->getUserId(),
                'eventName' => $this->getEventName(),
                'properties' => $this->getProperties()
            ]
        );
    }

    public function setUserId(string $userId): SegmentMessage {
        $this->userId = $userId;
        return $this;
    }

    public function getUserId(): string {
        return $this->userId;
    }

    public function setEventName(string $eventName): SegmentMessage {
        $this->eventName = $eventName;
        return $this;
    }

    public function getEventName(): string {
        return $this->eventName;
    }

    public function addProperty($name, $value): SegmentMessage {
        $this->properties[$name] = $value;
        return $this;
    }

    public function getProperties(): array {
        return $this->properties;
    }

    public function setType(string $type): SegmentMessage {
        if ($this->checkType($type) === true) {
            $this->type = $type;
        }
        return $this;
    }

    public function getType(): string {
        return $this->type;
    }

    protected function checkType(string $type): bool {
        return in_array($type, $this->getAllowedTypes());
    }

    protected function getAllowedTypes(): array {
        return [self::SEGMENT_TYPE_IDENTITY, self::SEGMENT_TYPE_TRACK];
    }

}