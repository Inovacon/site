<?php

function raw($class, $overrides = [])
{
    return factory($class)->raw($overrides);
}

function make($class, $overrides = [])
{
    return factory($class)->make($overrides);
}

function create($class, $overrides = [], $times = null)
{
    return factory($class, $times)->create($overrides);
}
