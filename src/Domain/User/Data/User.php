<?php

namespace App\Domain\User\Data;

/**
 * User data.
 */
final class User
{
    /** @var int */
    public $id;

    /** @var string */
    public $username;

    /** @var string */
    public $first_name;

    /** @var string */
    public $last_name;

    /** @var string */
    public $email;
}