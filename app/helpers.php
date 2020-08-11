<?php

function gavatar_url ($email)
{
    $email = md5($email);

    return "https://www.gravatar.com/avatar/{$email}" . http_build_query([ 's' => 60]);
}
