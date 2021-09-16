<?php

function hiddenEmail($email)
{
    return preg_replace('/\B[^@.]/', '*', $email);
}
