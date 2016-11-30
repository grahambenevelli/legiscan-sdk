<?php

namespace Grahamsfault\Service;


use GuzzleHttp\Client;
use PHPUnit_Framework_TestCase;


class LegiscanServiceTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var LegiscanService
     */
    private $service;

    /**
     * @var Client
     */
    private $client;

    public function setUp()
    {
        parent::setUp();
        $this->client = $this->getMockBuilder('GuzzleHttp\Client')
            ->setMethods(['get'])
            ->getMock();

        $this->service = new LegiscanService(
            'fake_api_key',
            $this->client
        );
    }

    public function testConstructorWithNoKey()
    {
        try {
            new LegiscanService(null);
            $this->fail('LegiscanException should have been thrown');
        } catch (LegiscanException $e) {
            // Expect an exception
        }
    }

    public function testGetStateList()
    {
        $response = [
            'status' => 'OK',
            'states' => [
                'TX',
                'US',
            ]
        ];

        $this->mockResponse($response);
        $actual = $this->service->getStateList();

        $expected = [
            'TX',
            'US'
        ];

        $this->assertEquals($expected, $actual);
    }

    public function testGetSessionList()
    {
        $expected = [
            [
                'session_id' => 1429,
                'state_id' => 43,
                'year_start' => 2017,
                'year_end]' => 2018,
                'special' => 0,
                'session_name' => '85th Legislature',
                'name' => '85th Legislature Regular Session',
            ],
            [
                'session_id' => 1115,
                'state_id' => 43,
                'year_start' => 2015,
                'year_end' => 2016,
                'special' => 0,
                'session_name' => '84th Legislature',
                'name' => '84th Legislature Regular Session',
            ],
            [
                'session_id' => 1047,
                'state_id' => 43,
                'year_start' => 2013,
                'year_end' => 2013,
                'special' => 1,
                'session_name' => '83rd Legislature 3rd Special Session',
                'name' => '83rd Legislature 3rd Special Session',
            ],
            [
                'session_id' => 1044,
                'state_id' => 43,
                'year_start' => 2013,
                'year_end' => 2013,
                'special' => 1,
                'session_name' => '83rd Legislature 2nd Special Session',
                'name' => '83rd Legislature 2nd Special Session',
            ],
        ];

        $response = [
            'status' => 'OK',
            'sessions' => $expected
        ];

        $this->mockResponse($response);
        $actual = $this->service->getSessionList('TX');

        $this->assertEquals($expected, $actual);
    }

    private function mockResponse($response)
    {
        $mockedResponse = $this->getMockBuilder('GuzzleHttp\Psr7\Response')
            ->setMethods(['getBody'])
            ->getMock();

        $mockedResponse->expects($this->once())
            ->method('getBody')
            ->willReturn(json_encode($response));

        $this->client->expects($this->once())
            ->method('get')
            ->willReturn($mockedResponse);
    }

}
