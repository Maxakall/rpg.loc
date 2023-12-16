<?php

namespace classes;

class Race {
    public string $race_type;
    public string $race_title;
    public string $race_modificator;

    public function __construct($race_type, $race_title, $race_modificator)
    {
        $this->race_type = $race_type;
        $this->race_title = $race_title;
        $this->race_modificator = $race_modificator;
    }

}