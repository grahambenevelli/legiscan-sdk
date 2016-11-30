<?php

namespace Grahamsfault\Service;


use GuzzleHttp\Client;

class LegiscanService
{
    const BASE_URL = 'api.legiscan.com';

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var Client
     */
    private $client;

    public function __construct($apiKey, $client = null)
    {
        if (!$apiKey) {
            throw new LegiscanException('Api Key needs to be set to create a LegiscanService');
        }

        $this->apiKey = $apiKey;

        if (!$client) {
            $client = new Client();
        }
        $this->client = $client;
    }

    public function getStateList()
    {
        $parsed = $this->sendRequest(Operation::GET_STATE_LIST);
        return $parsed['states'];
    }

    private function sendRequest($op, $query = [])
    {
        $baseUrl = self::BASE_URL;
        $baseQueryParam = [
            'key' => $this->apiKey,
            'op' => $op,
        ];

        $res = $this->client->get("http://{$baseUrl}", [
            'query' => array_merge($query, $baseQueryParam),
        ]);

        $json = json_decode($res->getBody(), true);

        if ($json['status'] == 'ERROR') {
            throw new LegiscanException('Get a message back ' . json_encode($json['alert']));
        }

        return $json;
    }

    public function getSessionList($state)
    {
        if (!$state) {
            throw new LegiscanException('$state needs to be set when calling getSessionList');
        }

        $parsed = $this->sendRequest(Operation::GET_SESSION_LIST, [
            'state' => $state,
        ]);

        return $parsed['sessions'];
    }

    public function getMasterList($state = null, $sessionId = null)
    {
        if (!$state && !$sessionId) {
            throw new LegiscanException('$state or $sessionId needs to be set when calling getMasterList');
        }

        $query = [
            'state' => $state,
            'session_id' => $sessionId,
        ];

        $parsed = $this->sendRequest(Operation::GET_MASTER_LIST, array_filter($query));
        return $parsed['masterlist'];
    }

    public function getBill($id = null, $state = null, $bill = null)
    {
        if (!$id && !($state && $bill)) {
            throw new LegiscanException('$state or $sessionId needs to be set when calling getMasterList');
        }

        $query = [
            'id' => $id,
            'state' => $state,
            'bill' => $bill,
        ];

        $parsed = $this->sendRequest(Operation::GET_BILL, array_filter($query));
        return $parsed['bill'];
    }

    public function getBillText($docId)
    {
        if (!$docId) {
            throw new LegiscanException('$docId needs to be set when calling getBillText');
        }

        $parsed = $this->sendRequest(Operation::GET_BILL_TEXT, [
            'id' => $docId,
        ]);

        return $parsed['text'];
    }

    public function getAmendment($amendmentId)
    {
        // TODO: not yet implemented, since there are no available amendmentIds to test this with
        throw new LegiscanException('getAmendment has not been implemented yet');
    }

    public function getSupplement($supplementId)
    {
        // TODO: not yet implemented, since there are no available supplementIds to test this with
        throw new LegiscanException('getAmendment has not been implemented yet');
    }

    public function getRollCall($rollCallId)
    {
        throw new LegiscanException('getRollCall has not been implemented yet');
    }

    public function getSponsor($peopleId)
    {
        throw new LegiscanException('getSponsor has not been implemented yet');
    }

    public function search($state, $bill, $query, $year, $page)
    {
        throw new LegiscanException('search has not been implemented yet');
    }
}