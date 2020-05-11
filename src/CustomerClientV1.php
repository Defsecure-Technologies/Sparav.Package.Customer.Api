<?php

namespace Sparav\Customer;


use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Sparav\Customer\Model\CreateUser;

class CustomerClientV1
{

    /**
     * @param string $username
     * @param string $password
     * @return Response
     */
    public function login(string $username, string $password)
    {
        $response = Http::timeout(15)
            ->withBasicAuth(env('SPARAV_CUSTOMER_API_AUTH_USERNAME'), env('SPARAV_CUSTOMER_API_AUTH_PASSWORD'))
            ->post('https://sparavcustomerapiprod.azurewebsites.net/api/v1/login', ['username' => $username, 'password' => $password]);
        return $response;
    }

    /**
     * @param CreateUser $createUser
     * @return Response
     */
    public function create(CreateUser $createUser)
    {
        $createUser = (array) $createUser;
        $response = Http::timeout(15)
            ->withBasicAuth(env('SPARAV_CUSTOMER_API_AUTH_USERNAME'), env('SPARAV_CUSTOMER_API_AUTH_PASSWORD'))
            ->post('https://sparavcustomerapiprod.azurewebsites.net/api/v1/create', $createUser);
        return $response;
    }

    /**
     * @param string $username
     * @return Response
     */
    public function findUserByUsername(string $username) {
        $response = Http::timeout(15)
            ->withBasicAuth(env('SPARAV_CUSTOMER_API_AUTH_USERNAME'), env('SPARAV_CUSTOMER_API_AUTH_PASSWORD'))
            ->get('https://sparavcustomerapiprod.azurewebsites.net/api/v1/user/findbyusername?username=blerim@cazimi.dk');
        return $response;
    }

}
