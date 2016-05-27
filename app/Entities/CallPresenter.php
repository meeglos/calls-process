<?php

namespace Calls\Entities;

class CallPresenter
{
    protected $call;

    /**
     * CallPresenter constructor.
     * @param $call
     */
    public function __construct(Call $call)
    {
        $this->call = $call;
    }

    public function callDetail()
    {
        return "Test: " . $this->call->client_id;
    }

    public function __get($property)
    {
        if (method_exists($this, $property)) {
            return call_user_func([$this, $property]);
        }
    }
}