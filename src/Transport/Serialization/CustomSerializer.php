<?php namespace App\Transport\Serialization;

use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Transport\Serialization\SerializerInterface;

class CustomSerializer implements SerializerInterface {

    public function decode(array $encodedEnvelope): Envelope {
        return new Envelope('');
    }

    public function encode(Envelope $envelope): array {
        return [
            'headers' => ['content-type' => 'application/json'],
            'body' => $envelope->getMessage()->getBody(),
        ];
    }

}