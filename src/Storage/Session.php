<?php

namespace Minhajul\Notify\Storage;

use Illuminate\Session\Store;

class Session
{

    protected $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    public function flash($key, $data = null)
    {
        if (is_array($key)) {
            return $this->flashMany($key);
        }

        return $this->session->flash($key, $data);
    }

    public function flashMany(array $data)
    {
        foreach ($data as $key => $value) {
            $this->flash($key, $value);
        }
    }

    public function get($key)
    {
        return $this->session->get($key);
    }
}
