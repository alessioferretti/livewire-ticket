<?php

namespace AlessioFerretti\LivewireTicket\Facades;

use Illuminate\Support\Facades\Facade;

class LivewireTicket extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'livewire-ticket';
    }
}
