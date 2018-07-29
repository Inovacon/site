<?php

function make($class, $overrides = [])
{
    return factory($class)->make($overrides);
}

function create($class, $overrides = [])
{
    return factory($class)->create($overrides);
}
