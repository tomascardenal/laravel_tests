<?php

function setActive($routeName)
{
    return request()->routeIs($routeName)? 'nav-link disabled' : 'nav-link';
}
