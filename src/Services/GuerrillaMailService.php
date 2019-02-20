<?php

namespace Services;

use GuzzleHttp;

/**
 * Class GuerrillaMailService
 * @package App\Services
 */
class GuerrillaMailService
{

    /**
     * @var GuzzleHttp\Client
     */
    private $guzzle;

    /**
     * @var string
     */
    private $email_address;

    /**
     * @var string
     */
    private $sessionID;

    /**
     * @return GuzzleHttp\Client
     */
    public function guzzle()
    {
        return $this->guzzle ?: $this->guzzle = new GuzzleHttp\Client();
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function registerEmailAddress()
    {
        $response = $this->submit([
            'query' => [
                'f' => 'get_email_address',
            ]
        ]);

        $this->email_address = array_get($response, 'email_addr');
        $this->sessionID = array_get($response, 'sid_token');

        return $this->email_address;
    }

    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->email_address;
    }

    /**
     * @param array $params
     * @return array
     * @throws \Exception
     */
    public function fetchInbox($params = [])
    {
        return $this->submit([
            'query' => [
                'f' => 'check_email',
                'seq' => array_get($params, 'seq', 0),
            ]
        ]) ?: [];
    }

    /**
     * Submit API request
     *
     * @param array $options
     * @return array
     * @throws \Exception
     */
    public function submit(array $options = [])
    {
        $endpoint = sprintf('http://api.guerrillamail.com/ajax.php');

        $query = [
            'ip' => env('REMOTE_ADDR'),
            'agent' => GuerrillaMailService::class,
        ];

        if ($this->sessionID) {
            $query['sid_token'] = $this->sessionID;
        }

        $url = implode('?', [
            $endpoint,
            http_build_query(array_merge(
                $query,
                array_get($options, 'query', [])
            ))
        ]);

        $response = [];

        try {
            $_response = $this->guzzle()->get($url);
            if ($_response && $_response->getStatusCode() == 200) {
                if ($contents = $_response->getBody()->getContents()) {
                    $response = json_decode($contents, true);
                }
            }
        } catch (\Exception $e) {
            //dump($e);
        }

        return $response;
    }
}