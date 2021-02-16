<?php


namespace Sparav\Customer\Model;


class UserInfo
{
    public int $customer_id;
    public ?string $firstname;
    public ?string $lastname;
    public ?string $email;
    public ?string $prefix;
    public ?string $phone;
    public ?string $address;
    public ?string $zipcode;
    public ?string $country;

    /**
     * UserInfo constructor.
     * @param int $customer_id
     * @param string|null $firstname
     * @param string|null $lastname
     * @param string|null $email
     * @param string|null $prefix
     * @param string|null $phone
     * @param string|null $address
     * @param string|null $zipcode
     * @param string|null $country
     */
    public function __construct(int $customer_id, ?string $firstname, ?string $lastname, ?string $email, ?string $prefix, ?string $phone, ?string $address, ?string $zipcode, ?string $country)
    {
        $this->customer_id = $customer_id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->prefix = $prefix;
        $this->phone = $phone;
        $this->address = $address;
        $this->zipcode = $zipcode;
        $this->country = $country;
    }

}
