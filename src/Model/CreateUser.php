<?php

namespace Sparav\Customer\Model;

class CreateUser
{

    public string $username;
    public string $password;
    public string $limelight_customer_id;

    /**
     * CreateUser constructor.
     * @param string $username
     * @param string $password
     * @param string|null $limelight_customer_id
     */
    public function __construct(string $username, string $password, string $limelight_customer_id = null)
    {
        $this->username = $username;
        $this->password = $password;
        $this->limelight_customer_id = $limelight_customer_id;
    }

}
