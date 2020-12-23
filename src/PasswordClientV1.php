<?php


namespace Sparav\Customer;


use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class PasswordClientV1
{

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

    /**
     * @param string $username
     * @return Response
     */
    public function resetPassword(string $username) {
        $response = Http::timeout(15)
            ->withBasicAuth(env('SPARAV_CUSTOMER_API_AUTH_USERNAME'), env('SPARAV_CUSTOMER_API_AUTH_PASSWORD'))
            ->post("https://sparavcustomerapiprod.azurewebsites.net/api/v1/forgotpassword/resetpassword", ['username' => $username]);
        return $response;
    }

    /**
     * @param string $token
     * @param string $new_password
     * @return Response
     */
    public function updatePasswordThroughForGotPassword(string $token, string $new_password) {
        $response = Http::timeout(15)
            ->withBasicAuth(env('SPARAV_CUSTOMER_API_AUTH_USERNAME'), env('SPARAV_CUSTOMER_API_AUTH_PASSWORD'))
            ->put("https://sparavcustomerapiprod.azurewebsites.net/api/v1/forgotpassword/updatepassword",
                ['token' => $token, 'password' => $new_password]);
        return $response;
    }


    /**
     * Verifies if the given password matches with the users.
     * Will return null, if no match found.
     * @param int $user_id
     * @param string $password
     * @return Response
     */
    public function verifyPassword(int $user_id, string $password) {
        $response = Http::timeout(15)
            ->retry(3, 300)
            ->withBasicAuth(env('SPARAV_CUSTOMER_API_AUTH_USERNAME'), env('SPARAV_CUSTOMER_API_AUTH_PASSWORD'))
            ->post("https://sparavcustomerapiprod.azurewebsites.net/api/v1/user/verifypassword",
                ['user_id' => $user_id, 'password' => $password]);
        return $response;
    }

}
