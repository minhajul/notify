<?php

namespace Minhajul\Notify;

use Illuminate\Support\Arr;
use Minhajul\Notify\Storage\Session;

class Notifier
{
    protected $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function flash($message, $type = null, array $options = [])
    {
        $this->session->flash([
            'notify.message' => $message,
            'notify.type' => $type,
            'notify.options' => json_encode($options),
        ]);
    }

    public function get($array = false)
    {
        return [
            'message' => $this->message(),
            'type' => $this->type(),
            'options' => $this->options($array),
        ];
    }

    public function ready()
    {
        return $this->message();
    }

    public function message()
    {
        return $this->session->get('notify.message');
    }

    public function type()
    {
        return $this->session->get('notify.type');
    }

    public function options($array = false)
    {
        return json_decode($this->session->get('notify.options'), $array);
    }

    public function option($key, $default = null)
    {
        return Arr::get($this->options(true), $key, $default);
    }
}
