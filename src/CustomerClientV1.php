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
            ->get("https://sparavcustomerapiprod.azurewebsites.net/api/v1/user/findbyusername?username={$username}");
        return $response;
    }

    /**
     * @param int $user_id
     * @param string $password
     * @param $admin_token
     * @return Response
     */
    public function updatePassword(int $user_id, string $password, $admin_token) {
        $response = Http::timeout(15)
            ->withBasicAuth(env('SPARAV_CUSTOMER_API_AUTH_USERNAME'), env('SPARAV_CUSTOMER_API_AUTH_PASSWORD'))
            ->put("https://sparavcustomerapiprod.azurewebsites.net/api/v1/user/updatepassword", ['user_id' => $user_id, 'password' => $password, 'admin_token' => $admin_token]);
        return $response;
    }

}
