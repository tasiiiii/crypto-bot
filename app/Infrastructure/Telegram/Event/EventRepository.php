<?php

namespace CryptoBot\Infrastructure\Telegram\Event;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use LogicException;

class EventRepository
{
    /**
     * @var EventInterface[]
     */
    private array $events = [];

    public function __construct()
    {
        $events = Config::get('telegram.events');

        foreach ($events as $event) {
            $object = App::make($event);

            if (!$object instanceof EventInterface) {
                throw new LogicException('Event not implement ' . EventInterface::class);
            }

            $this->events[] = $object;
        }
    }

    public function getByAlias(string $alias): ?EventInterface
    {
        foreach ($this->events as $event) {
            if ($event->getAlias() === $alias) {
                return $event;
            }
        }

        return null;
    }
}
