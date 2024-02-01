<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Pets
{
    /*
    * Get pets by status
    * @param array $status
    * @return array
    */
    public function getPets(Array $status): array
    {
        //prepare filter
        $filter = '';
        for ($i = 0; $i < count($status); $i++) {
            if(count($status)-1 == $i) {
                $filter .= 'status='.$status[$i];
            } else {
                $filter .= 'status='.$status[$i].'&';
            }
        }
        $errors = [
            400 => 'Invalid status value'
        ];
        //call api and return response
        return $this->client('pet/findByStatus?'.$filter);
    }

    /*
    * Get pets by id
    * @param $id
    * @return mixed
    */
    public function getPetsById($id): mixed
    {
        $errors = [
            400 => 'Invalid ID supplied',
            404 => 'Pet not found'
        ];
        //call api and return response
        return $this->client('pet/'.$id, $errors);

    }

    /****
     * Method to remove pet
     * @param $id
     * @return mixed
     */
    public function removePet($id) : mixed
    {
        $errors = [
            400 => 'Invalid ID supplied',
            404 => 'Pet not found'
        ];
        //call api and return response
        return $this->client('pet/'.$id, $errors, "DELETE");
    }

    /*
    * Method to update pet
    * @param $id
    * @return mixed
    */
    public function updatePet($data) : mixed
    {
        $errors = [
            400 => 'Invalid ID supplied',
            404 => 'Pet not found',
            405 => 'Validation exception',
        ];
        $body = json_encode($data);
        $headers = [
                'Content-Type' => 'application/json',
                'accept'       => 'application/json'
        ];
        //call api and return response
        return $this->client('pet', $errors, "PUT", $body, $headers);
    }

    /*
    * Method to create pet
    * @param $id
    * @return mixed
    */
    public function addPet($data) : mixed
    {
        $errors = [
            405 => 'Invalid input'
        ];
        $body = json_encode($data);
        $headers = [
                'Content-Type' => 'application/json',
                'accept'       => 'application/json'
        ];
        //call api and return response
        return $this->client('pet', $errors, "POST", $body, $headers);
    }
    /****
     * Method to call api directly
     * @param string $url
     * @param array $errors
     * @param string $method
     * @param mixed $options
     * @param mixed $body
     * @return mixed
     */
    protected function client(string $url, array $errors = [], string $method = 'GET',  mixed $body = '',  mixed $headers = []) : mixed {
        $hostname = env("API_URL").$url;
        try {
            $client = new Client();
            $responseRaw = $client->request($method, $hostname, [
                'body' => $body,
                'headers' => $headers,
            ]);
        } catch (\Exception $e) {
            abort($e->getCode(), $errors[$e->getCode()] ?? 'There was an error');
        }
        return json_decode($responseRaw->getBody());
    }



}
