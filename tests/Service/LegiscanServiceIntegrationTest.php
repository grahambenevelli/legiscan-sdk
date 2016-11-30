<?php

namespace Grahamsfault\Service;


use Gb\ConfiguredIntegrationTest;

/**
 * @group integration
 */
class LegiscanServiceIntegrationTest extends ConfiguredIntegrationTest
{
    /**
     * @var LegiscanService
     */
    private $service;

    public function setUp()
    {
        parent::setUp();
        $this->service = new LegiscanService(
            $this->getConfiguredValue('apiKey')
        );
    }

    public function testGetStateList()
    {
        $stateList = $this->service->getStateList();

        $expected = [
            'TX',
            'US'
        ];

        $this->assertEquals($expected, $stateList);
    }

    /**
     * @throws LegiscanException
     * @group now
     */
    public function testGetSessionList()
    {
        $stateList = $this->service->getSessionList('TX');

        $expected = [
            [
                'session_id' => 1429,
                'state_id' => 43,
                'year_start' => 2017,
                'year_end' => 2018,
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
            [
                'session_id' => 1041,
                'state_id' => 43,
                'year_start' => 2013,
                'year_end' => 2013,
                'special' => 1,
                'session_name' => '83rd Legislature 1st Special Session',
                'name' => '83rd Legislature 1st Special Session',
            ],
            [
                'session_id' => 985,
                'state_id' => 43,
                'year_start' => 2013,
                'year_end' => 2014,
                'special' => 0,
                'session_name' => '83rd Legislature',
                'name' => '83rd Legislature Regular Session',
            ],
            [
                'session_id' => 133,
                'state_id' => 43,
                'year_start' => 2011,
                'year_end' => 2011,
                'special' => 1,
                'session_name' => '82nd Legislature 1st Special',
                'name' => '82nd Legislature 1st Special',
            ],
            [
                'session_id' => 108,
                'state_id' => 43,
                'year_start' => 2011,
                'year_end' => 2012,
                'special' => 0,
                'session_name' => '82nd Legislature',
                'name' => '82nd Legislature Regular Session',
            ],
            [
                'session_id' => 75,
                'state_id' => 43,
                'year_start' => 2009,
                'year_end' => 2010,
                'special' => 0,
                'session_name' => '81st Legislature',
                'name' => '81st Legislature Regular Session',
            ],
        ];

        $this->assertEquals($expected, $stateList);
    }

    public function testMasterList()
    {
        $stateList = $this->service->getMasterList('TX');

        $expected = [
            'session_id' => 1429,
            'session_name' => '85th Legislature Regular Session',
        ];

        $this->assertEquals($expected, $stateList['session']);
        unset($stateList['session']);

        $expected = [
            [
                'bill_id' => 889411,
                'number' => 'HB41',
                'change_hash' => '7cf2fbf3283c4e942232bc0429595104',
                'url' => 'https://legiscan.com/TX/bill/HB41/2017',
                'status_date' => '2016-11-14',
                'status' => '1',
                'last_action_date' => '2016-11-14',
                'last_action' => 'Filed',
                'title' => 'Relating to the sale of fireworks on and before the Juneteenth holiday.',
                'description' => 'Relating to the sale of fireworks on and before the Juneteenth holiday.',
            ],
            [
                'bill_id' => 889368,
                'number' => 'HB42',
                'change_hash' => '3e49f729ce1bb06a8a94fc099dde60fe',
                'url' => 'https://legiscan.com/TX/bill/HB42/2017',
                'status_date' => '2016-11-14',
                'status' => '1',
                'last_action_date' => '2016-11-14',
                'last_action' => 'Filed',
                'title' => 'Relating to a franchise tax credit for certain taxable entities offering postsecondary tuition assistance.',
                'description' => 'Relating to a franchise tax credit for certain taxable entities offering postsecondary tuition assistance.',
            ],
            [
                'bill_id' => 889354,
                'number' => 'HB43',
                'change_hash' => 'eb3be12d779faaa9dc74f601bf6dfa00',
                'url' => 'https://legiscan.com/TX/bill/HB43/2017',
                'status_date' => '2016-11-14',
                'status' => '1',
                'last_action_date' => '2016-11-14',
                'last_action' => 'Filed',
                'title' => 'Relating to the public retirement systems of certain municipalities.',
                'description' => 'Relating to the public retirement systems of certain municipalities.',
            ],
            [
                'bill_id' => 888916,
                'number' => 'HB44',
                'change_hash' => 'd80c82533c8ea03ff447c545463cde10',
                'url' => 'https://legiscan.com/TX/bill/HB44/2017',
                'status_date' => '2016-11-14',
                'status' => '1',
                'last_action_date' => '2016-11-14',
                'last_action' => 'Filed',
                'title' => 'Relating to a limitation on the maximum appraised value of real property for ad valorem tax purposes of 105 percent of the appraised value of the property for the preceding tax year.',
                'description' => 'Relating to a limitation on the maximum appraised value of real property for ad valorem tax purposes of 105 percent of the appraised value of the property for the preceding tax year.',
            ],
            [
                'bill_id' => 888808,
                'number' => 'HB45',
                'change_hash' => '96e30a0d135d63ac01e2899306512cde',
                'url' => 'https://legiscan.com/TX/bill/HB45/2017',
                'status_date' => '2016-11-14',
                'status' => '1',
                'last_action_date' => '2016-11-14',
                'last_action' => 'Filed',
                'title' => 'Relating to the application of foreign laws and foreign forum selection in this state.',
                'description' => 'Relating to the application of foreign laws and foreign forum selection in this state.',
            ],
        ];

        $slice = array_slice($stateList, 0, 5);

        foreach ($stateList as $item) {
            $bill = $this->service->getBill($item['bill_id']);
            if ($bill['amendments']) {
                $this->assertEquals([], $bill['amendments']);
                return;
            }
        }
        $this->assertEquals($expected, $slice);
    }

    public function testGetBillBillNumber()
    {
        $stateList = $this->service->getBill(null, 'TX', 'HB1');

        $this->assertEquals([], $stateList);
    }

    public function testGetBill()
    {
        $stateList = $this->service->getBill(888808);

        $expected = [
            'bill_id' => 888808,
            'change_hash' => '96e30a0d135d63ac01e2899306512cde',
            'session' => [
                'session_id' => 1429,
                'session_name' => '85th Legislature Regular Session',
                'session_title' => '85th Legislature',
            ],
            'url' => 'https://legiscan.com/TX/bill/HB45/2017',
            'state_link' => 'http://www.legis.state.tx.us/BillLookup/History.aspx?LegSess=85R&Bill=HB45',
            'completed' => 0,
            'status' => 1,
            'status_date' => '2016-11-14',
            'progress' => [
                [
                    'date' => '2016-11-14',
                    'event' => 1,
                ],
            ],
            'state' => 'TX',
            'state_id' => 43,
            'bill_number' => 'HB45',
            'bill_type' => 'B',
            'body' => 'H',
            'body_id' => 91,
            'current_body' => 'H',
            'current_body_id' => 91,
            'title' => 'Relating to the application of foreign laws and foreign forum selection in this state.',
            'description' => 'Relating to the application of foreign laws and foreign forum selection in this state.',
            'committee' => [],
            'history' => [
                [
                    'date' => '2016-11-14',
                    'action' => 'Filed',
                    'chamber' => 'H',
                    'chamber_id' => 91,
                    'importance' => 1,
                ],
            ],
            'sponsors' => [
                [
                    'people_id' => 5895,
                    'party_id' => 2,
                    'party' => 'R',
                    'role_id' => 1,
                    'role' => 'Rep',
                    'name' => 'Dan Flynn',
                    'first_name' => 'Dan',
                    'middle_name' => '',
                    'last_name' => 'Flynn',
                    'suffix' => '',
                    'nickname' => '',
                    'district' => 'HD-002',
                    'ftm_eid' => 6582777,
                    'sponsor_type_id' => 1,
                    'sponsor_order' => 1,
                    'committee_sponsor' => 0,
                    'committee_id' => '0',
                ],
            ],
            'sasts' => [],
            'subjects' => [
                [
                    'subject_id' => 5349,
                    'subject_name' => 'Civil Remedies & Liabilities',
                ],
                [
                    'subject_id' => 5366,
                    'subject_name' => 'Courts',
                ],
                [
                    'subject_id' => 5558,
                    'subject_name' => 'Courts--General',
                ],
                [
                    'subject_id' => 23705,
                    'subject_name' => 'FORUM NON CONVENIENS',
                ],
            ],
            'texts' => [
                [
                    'doc_id' => 1434256,
                    'date' => '2016-11-14',
                    'type' => 'Introduced',
                    'mime' => 'text/html',
                    'url' => 'https://legiscan.com/TX/text/HB45/id/1434256',
                    'state_link' => 'http://www.legis.state.tx.us/tlodocs/85R/billtext/html/HB00045I.htm',
                    'text_size' => 15671,
                ],
            ],
            'votes' => [],
            'amendments' => [],
            'supplements' => [],
            'calendar' => [],
        ];

        $this->assertEquals($expected, $stateList);
    }

    public function testGetBillText()
    {
        $stateList = $this->service->getBillText(1434256);

        $expected = [
            'doc_id' => 1434256,
            'bill_id' => 888808,
            'date' => '2016-11-14',
            'type' => 'Introduced',
            'mime' => 'text/html',
            'text_size' => 15671,
            'doc' => 'DQogICAgPHN0eWxlIHR5cGU9InRleHQvY3NzIj50ZCB7IGZvbnQtZmFtaWx5OiBDb3VyaWVyLCBBcmlhbCwgc2Fucy1zZXJpZjsgZm9udC1zaXplOiAxMHB0OyB9IHRhYmxlIHsgZW1wdHktY2VsbHM6c2hvdzsgfSA8L3N0eWxlPg0KICAgIDx0YWJsZSB3aWR0aD0iNjgwIiBjZWxscGFkZGluZz0iMCIgY2VsbHNwYWNpbmc9IjAiPg0KICAgICAgPHRyPg0KICAgICAgICA8dGQgd2lkdGg9IjY1IiB2YWxpZ249InRvcCI+JiN4QTA7PC90ZD4NCiAgICAgICAgPHRkIHdpZHRoPSI2MTUiIHZhbGlnbj0idG9wIiBjb2xzcGFuPSIyIj44NVIzMzc0IENBRS1GPC90ZD4NCiAgICAgIDwvdHI+DQogICAgICA8dHI+DQogICAgICAgIDx0ZCBjb2xzcGFuPSIzIj4mI3hBMDs8L3RkPg0KICAgICAgPC90cj4NCiAgICAgIDx0cj4NCiAgICAgICAgPHRkIHdpZHRoPSI2NSIgdmFsaWduPSJ0b3AiPiYjeEEwOzwvdGQ+DQogICAgICAgIDx0ZCB3aWR0aD0iNDUwIiB2YWxpZ249InRvcCIgYWxpZ249ImxlZnQiPg0KCQlCeTomI3hBMDtGbHlubjwvdGQ+DQogICAgICAgIDx0ZCB3aWR0aD0iMTY1IiB2YWxpZ249InRvcCIgYWxpZ249InJpZ2h0Ij5ILkIuJiN4QTA7Tm8uJiN4QTA7NDU8L3RkPg0KICAgICAgPC90cj4NCiAgICA8L3RhYmxlPg0KICAgIDx0YWJsZSB3aWR0aD0iNjgwIiBjZWxscGFkZGluZz0iMCIgY2VsbHNwYWNpbmc9IjAiPg0KICAgICAgPHRyPg0KICAgICAgICA8dGQgY29sc3Bhbj0iMyI+JiN4QTA7PC90ZD4NCiAgICAgIDwvdHI+DQogICAgICA8dHI+DQogICAgICAgIDx0ZCBjb2xzcGFuPSIzIj4mI3hBMDs8L3RkPg0KICAgICAgPC90cj4NCiAgICAgIDx0cj4NCiAgICAgICAgPHRkIHdpZHRoPSI2NSIgdmFsaWduPSJ0b3AiPg0KICAgICAgICAgIDxNRVRBIG5hbWU9IlBHTE4iIGNvbnRlbnRzPSIiPiYjeEEwOwkJDQoJCQk8L3RkPg0KICAgICAgICA8dGQgd2lkdGg9IjYxNSIgY29sc3Bhbj0iMiIgdmFsaWduPSJ0b3AiIGFsaWduPSJjZW50ZXIiPg0KICAgICAgICAgIDxjZW50ZXI+QSBCSUxMIFRPIEJFIEVOVElUTEVEPC9jZW50ZXI+DQogICAgICAgIDwvdGQ+DQogICAgICA8L3RyPg0KICAgICAgPHRyPg0KICAgICAgICA8dGQgd2lkdGg9IjY1IiB2YWxpZ249InRvcCI+DQogICAgICAgICAgPE1FVEEgbmFtZT0iUEdMTiIgY29udGVudHM9IjEtMSI+JiN4QTA7DQoJCQk8L3RkPg0KICAgICAgICA8dGQgd2lkdGg9IjYxNSIgY29sc3Bhbj0iMiIgdmFsaWduPSJ0b3AiIGFsaWduPSJjZW50ZXIiPg0KICAgICAgICAgIDxjZW50ZXI+QU4gQUNUPC9jZW50ZXI+DQogICAgICAgIDwvdGQ+DQogICAgICA8L3RyPg0KICAgICAgPHRyPg0KICAgICAgICA8dGQgd2lkdGg9IjY1IiB2YWxpZ249InRvcCI+DQogICAgICAgICAgPE1FVEEgbmFtZT0iUEdMTiIgY29udGVudHM9IjEtMiI+JiN4QTA7DQoJCQk8L3RkPg0KICAgICAgICA8dGQgd2lkdGg9IjYxNSIgY29sc3Bhbj0iMiIgdmFsaWduPSJ0b3AiPnJlbGF0aW5nIHRvIHRoZSBhcHBsaWNhdGlvbiBvZiBmb3JlaWduIGxhd3MgYW5kIGZvcmVpZ24gZm9ydW0gPC90ZD4NCiAgICAgIDwvdHI+DQogICAgICA8dHI+DQogICAgICAgIDx0ZCB3aWR0aD0iNjUiIHZhbGlnbj0idG9wIj4NCiAgICAgICAgICA8TUVUQSBuYW1lPSJQR0xOIiBjb250ZW50cz0iMS0zIj4mI3hBMDsNCgkJCTwvdGQ+DQogICAgICAgIDx0ZCB3aWR0aD0iNjE1IiBjb2xzcGFuPSIyIiB2YWxpZ249InRvcCI+c2VsZWN0aW9uIGluIHRoaXMgc3RhdGUuPC90ZD4NCiAgICAgIDwvdHI+DQogICAgICA8dHI+DQogICAgICAgIDx0ZCB3aWR0aD0iNjUiIHZhbGlnbj0idG9wIj4NCiAgICAgICAgICA8TUVUQSBuYW1lPSJQR0xOIiBjb250ZW50cz0iMS00Ij4mI3hBMDsNCgkJCTwvdGQ+DQogICAgICAgIDx0ZCB3aWR0aD0iNjE1IiBjb2xzcGFuPSIyIiB2YWxpZ249InRvcCI+JiN4QTA7JiN4QTA7JiN4QTA7JiN4QTA7JiN4QTA7JiN4QTA7JiN4QTA7QkUgSVQgRU5BQ1RFRCBCWSBUSEUgTEVHSVNMQVRVUkUgT0YgVEhFIFNUQVRFIE9GIFRFWEFTOjwvdGQ+DQogICAgICA8L3RyPg0KICAgICAgPHRyPg0KICAgICAgICA8dGQgd2lkdGg9IjY1IiB2YWxpZ249InRvcCI+DQogICAgICAgICAgPE1FVEEgbmFtZT0iUEdMTiIgY29udGVudHM9IjEtNSI+JiN4QTA7DQoJCQk8L3RkPg0KICAgICAgICA8dGQgd2lkdGg9IjYxNSIgY29sc3Bhbj0iMiIgdmFsaWduPSJ0b3AiPiYjeEEwOyYjeEEwOyYjeEEwOyYjeEEwOyYjeEEwOyYjeEEwOyYjeEEwO1NFQ1RJT04mI3hBMDsxLiYjeEEwOyYjeEEwO1RpdGxlIDYsIENpdmlsIFByYWN0aWNlIGFuZCBSZW1lZGllcyBDb2RlLCBpcyA8L3RkPg0KICAgICAgPC90cj4NCiAgICAgIDx0cj4NCiAgICAgICAgPHRkIHdpZHRoPSI2NSIgdmFsaWduPSJ0b3AiPg0KICAgICAgICAgIDxNRVRBIG5hbWU9IlBHTE4iIGNvbnRlbnRzPSIxLTYiPiYjeEEwOw0KCQkJPC90ZD4NCiAgICAgICAgPHRkIHdpZHRoPSI2MTUiIGNvbHNwYW49IjIiIHZhbGlnbj0idG9wIj5hbWVuZGVkIGJ5IGFkZGluZyBDaGFwdGVyIDE0OCB0byByZWFkIGFzIGZvbGxvd3M6PC90ZD4NCiAgICAgIDwvdHI+DQogICAgICA8dHI+DQogICAgICAgIDx0ZCB3aWR0aD0iNjUiIHZhbGlnbj0idG9wIj4NCiAgICAgICAgICA8TUVUQSBuYW1lPSJQR0xOIiBjb250ZW50cz0iMS03Ij4mI3hBMDsNCgkJCTwvdGQ+DQogICAgICAgIDx0ZCB3aWR0aD0iNjE1IiBjb2xzcGFuPSIyIiB2YWxpZ249InRvcCIgYWxpZ249ImNlbnRlciI+PHU+Q0hBUFRFUiAxNDguICBBUFBMSUNBVElPTiBPRiBGT1JFSUdOIExBV1M7IFNFTEVDVElPTiBPRiBGT1JFSUdOIDwvdT48L3RkPg0KICAgICAgPC90cj4NCiAgICAgIDx0cj4NCiAgICAgICAgPHRkIHdpZHRoPSI2NSIgdmFsaWduPSJ0b3AiPg0KICAgICAgICAgIDxNRVRBIG5hbWU9IlBHTE4iIGNvbnRlbnRzPSIxLTgiPiYjeEEwOw0KCQkJPC90ZD4NCiAgICAgICAgPHRkIHdpZHRoPSI2MTUiIGNvbHNwYW49IjIiIHZhbGlnbj0idG9wIiBhbGlnbj0iY2VudGVyIj48dT5GT1JVTTwvdT48L3RkPg0KICAgICAgPC90cj4NCiAgICAgIDx0cj4NCiAgICAgICAgPHRkIHdpZHRoPSI2NSIgdmFsaWduPSJ0b3AiPg0KICAgICAgICAgIDxNRVRBIG5hbWU9IlBHTE4iIGNvbnRlbnRzPSIxLTkiPiYjeEEwOw0KCQkJPC90ZD4NCiAgICAgICAgPHRkIHdpZHRoPSI2MTUiIGNvbHNwYW49IjIiIHZhbGlnbj0idG9wIj4mI3hBMDsmI3hBMDsmI3hBMDsmI3hBMDsmI3hBMDsmI3hBMDsmI3hBMDs8dT5TZWMuPC91Pjx1PiYjeEEwOzwvdT48dT4xNDguMDAxLjwvdT48dT4mI3hBMDs8L3U+PHU+JiN4QTA7PC91Pjx1PkRFRklOSVRJT04uICBJbiB0aGlzIGNoYXB0ZXIsICJmb3JlaWduIGxhdyIgPC91PjwvdGQ+DQogICAgICA8L3RyPg0KICAgICAgPHRyPg0KICAgICAgICA8dGQgd2lkdGg9IjY1IiB2YWxpZ249InRvcCI+DQogICAgICAgICAgPE1FVEEgbmFtZT0iUEdMTiIgY29udGVudHM9IjEtMTAiPiYjeEEwOw0KCQkJPC90ZD4NCiAgICAgICAgPHRkIHdpZHRoPSI2MTUiIGNvbHNwYW49IjIiIHZhbGlnbj0idG9wIj48dT5tZWFucyBhIGxhdywgcnVsZSwgb3IgbGVnYWwgY29kZSBvZiBhIGp1cmlzZGljdGlvbiBvdXRzaWRlIG9mIHRoZSA8L3U+PC90ZD4NCiAgICAgIDwvdHI+DQogICAgICA8dHI+DQogICAgICAgIDx0ZCB3aWR0aD0iNjUiIHZhbGlnbj0idG9wIj4NCiAgICAgICAgICA8TUVUQSBuYW1lPSJQR0xOIiBjb250ZW50cz0iMS0xMSI+JiN4QTA7DQoJCQk8L3RkPg0KICAgICAgICA8dGQgd2lkdGg9IjYxNSIgY29sc3Bhbj0iMiIgdmFsaWduPSJ0b3AiPjx1PnN0YXRlcyBhbmQgdGVycml0b3JpZXMgb2YgdGhlIFVuaXRlZCBTdGF0ZXMuIDwvdT48dT4mI3hBMDs8L3U+PHU+VGhlIHRlcm0gZG9lcyBub3QgPC91PjwvdGQ+DQogICAgICA8L3RyPg0KICAgICAgPHRyPg0KICAgICAgICA8dGQgd2lkdGg9IjY1IiB2YWxpZ249InRvcCI+DQogICAgICAgICAgPE1FVEEgbmFtZT0iUEdMTiIgY29udGVudHM9IjEtMTIiPiYjeEEwOw0KCQkJPC90ZD4NCiAgICAgICAgPHRkIHdpZHRoPSI2MTUiIGNvbHNwYW49IjIiIHZhbGlnbj0idG9wIj48dT5pbmNsdWRlIGEgbGF3IG9mIGEgTmF0aXZlIEFtZXJpY2FuIHRyaWJlIG9mIGEgc3RhdGUgb3IgdGVycml0b3J5IG9mIDwvdT48L3RkPg0KICAgICAgPC90cj4NCiAgICAgIDx0cj4NCiAgICAgICAgPHRkIHdpZHRoPSI2NSIgdmFsaWduPSJ0b3AiPg0KICAgICAgICAgIDxNRVRBIG5hbWU9IlBHTE4iIGNvbnRlbnRzPSIxLTEzIj4mI3hBMDsNCgkJCTwvdGQ+DQogICAgICAgIDx0ZCB3aWR0aD0iNjE1IiBjb2xzcGFuPSIyIiB2YWxpZ249InRvcCI+PHU+dGhlIFVuaXRlZCBTdGF0ZXMuPC91PjwvdGQ+DQogICAgICA8L3RyPg0KICAgICAgPHRyPg0KICAgICAgICA8dGQgd2lkdGg9IjY1IiB2YWxpZ249InRvcCI+DQogICAgICAgICAgPE1FVEEgbmFtZT0iUEdMTiIgY29udGVudHM9IjEtMTQiPiYjeEEwOw0KCQkJPC90ZD4NCiAgICAgICAgPHRkIHdpZHRoPSI2MTUiIGNvbHNwYW49IjIiIHZhbGlnbj0idG9wIj4mI3hBMDsmI3hBMDsmI3hBMDsmI3hBMDsmI3hBMDsmI3hBMDsmI3hBMDs8dT5TZWMuPC91Pjx1PiYjeEEwOzwvdT48dT4xNDguMDAyLjwvdT48dT4mI3hBMDs8L3U+PHU+JiN4QTA7PC91Pjx1PkRFQ0lTSU9OIEJBU0VEIE9OIEZPUkVJR04gTEFXLiAgQSBydWxpbmcgb3IgPC91PjwvdGQ+DQogICAgICA8L3RyPg0KICAgICAgPHRyPg0KICAgICAgICA8dGQgd2lkdGg9IjY1IiB2YWxpZ249InRvcCI+DQogICAgICAgICAgPE1FVEEgbmFtZT0iUEdMTiIgY29udGVudHM9IjEtMTUiPiYjeEEwOw0KCQkJPC90ZD4NCiAgICAgICAgPHRkIHdpZHRoPSI2MTUiIGNvbHNwYW49IjIiIHZhbGlnbj0idG9wIj48dT5kZWNpc2lvbiBvZiBhIGNvdXJ0LCBhcmJpdHJhdG9yLCBvciBhZG1pbmlzdHJhdGl2ZSBhZGp1ZGljYXRvciBtYXkgPC91PjwvdGQ+DQogICAgICA8L3RyPg0KICAgICAgPHRyPg0KICAgICAgICA8dGQgd2lkdGg9IjY1IiB2YWxpZ249InRvcCI+DQogICAgICAgICAgPE1FVEEgbmFtZT0iUEdMTiIgY29udGVudHM9IjEtMTYiPiYjeEEwOw0KCQkJPC90ZD4NCiAgICAgICAgPHRkIHdpZHRoPSI2MTUiIGNvbHNwYW49IjIiIHZhbGlnbj0idG9wIj48dT5ub3QgYmUgYmFzZWQgb24gYSBmb3JlaWduIGxhdyBpZiB0aGUgYXBwbGljYXRpb24gb2YgdGhhdCBsYXcgd291bGQgPC91PjwvdGQ+DQogICAgICA8L3RyPg0KICAgICAgPHRyPg0KICAgICAgICA8dGQgd2lkdGg9IjY1IiB2YWxpZ249InRvcCI+DQogICAgICAgICAgPE1FVEEgbmFtZT0iUEdMTiIgY29udGVudHM9IjEtMTciPiYjeEEwOw0KCQkJPC90ZD4NCiAgICAgICAgPHRkIHdpZHRoPSI2MTUiIGNvbHNwYW49IjIiIHZhbGlnbj0idG9wIj48dT52aW9sYXRlIGEgcmlnaHQgZ3VhcmFudGVlZCBieSB0aGUgVW5pdGVkIFN0YXRlcyBDb25zdGl0dXRpb24gb3IgdGhlIDwvdT48L3RkPg0KICAgICAgPC90cj4NCiAgICAgIDx0cj4NCiAgICAgICAgPHRkIHdpZHRoPSI2NSIgdmFsaWduPSJ0b3AiPg0KICAgICAgICAgIDxNRVRBIG5hbWU9IlBHTE4iIGNvbnRlbnRzPSIxLTE4Ij4mI3hBMDsNCgkJCTwvdGQ+DQogICAgICAgIDx0ZCB3aWR0aD0iNjE1IiBjb2xzcGFuPSIyIiB2YWxpZ249InRvcCI+PHU+Y29uc3RpdHV0aW9uIG9mIHRoaXMgc3RhdGUuPC91PjwvdGQ+DQogICAgICA8L3RyPg0KICAgICAgPHRyPg0KICAgICAgICA8dGQgd2lkdGg9IjY1IiB2YWxpZ249InRvcCI+DQogICAgICAgICAgPE1FVEEgbmFtZT0iUEdMTiIgY29udGVudHM9IjEtMTkiPiYjeEEwOw0KCQkJPC90ZD4NCiAgICAgICAgPHRkIHdpZHRoPSI2MTUiIGNvbHNwYW49IjIiIHZhbGlnbj0idG9wIj4mI3hBMDsmI3hBMDsmI3hBMDsmI3hBMDsmI3hBMDsmI3hBMDsmI3hBMDs8dT5TZWMuPC91Pjx1PiYjeEEwOzwvdT48dT4xNDguMDAzLjwvdT48dT4mI3hBMDs8L3U+PHU+JiN4QTA7PC91Pjx1PkNIT0lDRSBPRiBGT1JFSUdOIExBVyBPUiBGT1JVTSBJTiBDT05UUkFDVC4gIDwvdT48L3RkPg0KICAgICAgPC90cj4NCiAgICAgIDx0cj4NCiAgICAgICAgPHRkIHdpZHRoPSI2NSIgdmFsaWduPSJ0b3AiPg0KICAgICAgICAgIDxNRVRBIG5hbWU9IlBHTE4iIGNvbnRlbnRzPSIxLTIwIj4mI3hBMDsNCgkJCTwvdGQ+DQogICAgICAgIDx0ZCB3aWR0aD0iNjE1IiBjb2xzcGFuPSIyIiB2YWxpZ249InRvcCI+PHU+KGEpICBBIGNvbnRyYWN0IHByb3Zpc2lvbiBwcm92aWRpbmcgdGhhdCBhIGZvcmVpZ24gbGF3IGlzIHRvIGdvdmVybiA8L3U+PC90ZD4NCiAgICAgIDwvdHI+DQogICAgICA8dHI+DQogICAgICAgIDx0ZCB3aWR0aD0iNjUiIHZhbGlnbj0idG9wIj4NCiAgICAgICAgICA8TUVUQSBuYW1lPSJQR0xOIiBjb250ZW50cz0iMS0yMSI+JiN4QTA7DQoJCQk8L3RkPg0KICAgICAgICA8dGQgd2lkdGg9IjYxNSIgY29sc3Bhbj0iMiIgdmFsaWduPSJ0b3AiPjx1PmEgZGlzcHV0ZSBhcmlzaW5nIHVuZGVyIHRoZSBjb250cmFjdCBpcyB2b2lkIHRvIHRoZSBleHRlbnQgdGhhdCB0aGUgPC91PjwvdGQ+DQogICAgICA8L3RyPg0KICAgICAgPHRyPg0KICAgICAgICA8dGQgd2lkdGg9IjY1IiB2YWxpZ249InRvcCI+DQogICAgICAgICAgPE1FVEEgbmFtZT0iUEdMTiIgY29udGVudHM9IjEtMjIiPiYjeEEwOw0KCQkJPC90ZD4NCiAgICAgICAgPHRkIHdpZHRoPSI2MTUiIGNvbHNwYW49IjIiIHZhbGlnbj0idG9wIj48dT5hcHBsaWNhdGlvbiBvZiB0aGUgZm9yZWlnbiBsYXcgdG8gdGhlIGRpc3B1dGUgd291bGQgdmlvbGF0ZSBhIHJpZ2h0IDwvdT48L3RkPg0KICAgICAgPC90cj4NCiAgICAgIDx0cj4NCiAgICAgICAgPHRkIHdpZHRoPSI2NSIgdmFsaWduPSJ0b3AiPg0KICAgICAgICAgIDxNRVRBIG5hbWU9IlBHTE4iIGNvbnRlbnRzPSIxLTIzIj4mI3hBMDsNCgkJCTwvdGQ+DQogICAgICAgIDx0ZCB3aWR0aD0iNjE1IiBjb2xzcGFuPSIyIiB2YWxpZ249InRvcCI+PHU+Z3VhcmFudGVlZCBieSB0aGUgVW5pdGVkIFN0YXRlcyBDb25zdGl0dXRpb24gb3IgdGhlIGNvbnN0aXR1dGlvbiBvZiA8L3U+PC90ZD4NCiAgICAgIDwvdHI+DQogICAgICA8dHI+DQogICAgICAgIDx0ZCB3aWR0aD0iNjUiIHZhbGlnbj0idG9wIj4NCiAgICAgICAgICA8TUVUQSBuYW1lPSJQR0xOIiBjb250ZW50cz0iMS0yNCI+JiN4QTA7DQoJCQk8L3RkPg0KICAgICAgICA8dGQgd2lkdGg9IjYxNSIgY29sc3Bhbj0iMiIgdmFsaWduPSJ0b3AiPjx1PnRoaXMgc3RhdGUuPC91PjwvdGQ+DQogICAgICA8L3RyPg0KICAgICAgPHRyPg0KICAgICAgICA8dGQgd2lkdGg9IjY1IiB2YWxpZ249InRvcCI+DQogICAgICAgICAgPE1FVEEgbmFtZT0iUEdMTiIgY29udGVudHM9IjItMSI+JiN4QTA7DQoJCQk8L3RkPg0KICAgICAgICA8dGQgd2lkdGg9IjYxNSIgY29sc3Bhbj0iMiIgdmFsaWduPSJ0b3AiPiYjeEEwOyYjeEEwOyYjeEEwOyYjeEEwOyYjeEEwOyYjeEEwOyYjeEEwOzx1PihiKTwvdT48dT4mI3hBMDs8L3U+PHU+JiN4QTA7PC91Pjx1PkEgY29udHJhY3QgcHJvdmlzaW9uIHByb3ZpZGluZyB0aGF0IHRoZSBmb3J1bSB0byByZXNvbHZlIDwvdT48L3RkPg0KICAgICAgPC90cj4NCiAgICAgIDx0cj4NCiAgICAgICAgPHRkIHdpZHRoPSI2NSIgdmFsaWduPSJ0b3AiPg0KICAgICAgICAgIDxNRVRBIG5hbWU9IlBHTE4iIGNvbnRlbnRzPSIyLTIiPiYjeEEwOw0KCQkJPC90ZD4NCiAgICAgICAgPHRkIHdpZHRoPSI2MTUiIGNvbHNwYW49IjIiIHZhbGlnbj0idG9wIj48dT5hIGRpc3B1dGUgYXJpc2luZyB1bmRlciB0aGUgY29udHJhY3QgaXMgbG9jYXRlZCBvdXRzaWRlIHRoZSBzdGF0ZXMgPC91PjwvdGQ+DQogICAgICA8L3RyPg0KICAgICAgPHRyPg0KICAgICAgICA8dGQgd2lkdGg9IjY1IiB2YWxpZ249InRvcCI+DQogICAgICAgICAgPE1FVEEgbmFtZT0iUEdMTiIgY29udGVudHM9IjItMyI+JiN4QTA7DQoJCQk8L3RkPg0KICAgICAgICA8dGQgd2lkdGg9IjYxNSIgY29sc3Bhbj0iMiIgdmFsaWduPSJ0b3AiPjx1PmFuZCB0ZXJyaXRvcmllcyBvZiB0aGUgVW5pdGVkIFN0YXRlcyBpcyB2b2lkIGlmIHRoZSBmb3JlaWduIGxhdyB0aGF0IDwvdT48L3RkPg0KICAgICAgPC90cj4NCiAgICAgIDx0cj4NCiAgICAgICAgPHRkIHdpZHRoPSI2NSIgdmFsaWduPSJ0b3AiPg0KICAgICAgICAgIDxNRVRBIG5hbWU9IlBHTE4iIGNvbnRlbnRzPSIyLTQiPiYjeEEwOw0KCQkJPC90ZD4NCiAgICAgICAgPHRkIHdpZHRoPSI2MTUiIGNvbHNwYW49IjIiIHZhbGlnbj0idG9wIj48dT53b3VsZCBiZSBhcHBsaWVkIHRvIHRoZSBkaXNwdXRlIGluIHRoYXQgZm9ydW0gd291bGQsIGFzIGFwcGxpZWQsIDwvdT48L3RkPg0KICAgICAgPC90cj4NCiAgICAgIDx0cj4NCiAgICAgICAgPHRkIHdpZHRoPSI2NSIgdmFsaWduPSJ0b3AiPg0KICAgICAgICAgIDxNRVRBIG5hbWU9IlBHTE4iIGNvbnRlbnRzPSIyLTUiPiYjeEEwOw0KCQkJPC90ZD4NCiAgICAgICAgPHRkIHdpZHRoPSI2MTUiIGNvbHNwYW49IjIiIHZhbGlnbj0idG9wIj48dT52aW9sYXRlIGEgcmlnaHQgZ3VhcmFudGVlZCBieSB0aGUgVW5pdGVkIFN0YXRlcyBDb25zdGl0dXRpb24gb3IgdGhlIDwvdT48L3RkPg0KICAgICAgPC90cj4NCiAgICAgIDx0cj4NCiAgICAgICAgPHRkIHdpZHRoPSI2NSIgdmFsaWduPSJ0b3AiPg0KICAgICAgICAgIDxNRVRBIG5hbWU9IlBHTE4iIGNvbnRlbnRzPSIyLTYiPiYjeEEwOw0KCQkJPC90ZD4NCiAgICAgICAgPHRkIHdpZHRoPSI2MTUiIGNvbHNwYW49IjIiIHZhbGlnbj0idG9wIj48dT5jb25zdGl0dXRpb24gb2YgdGhpcyBzdGF0ZS48L3U+PC90ZD4NCiAgICAgIDwvdHI+DQogICAgICA8dHI+DQogICAgICAgIDx0ZCB3aWR0aD0iNjUiIHZhbGlnbj0idG9wIj4NCiAgICAgICAgICA8TUVUQSBuYW1lPSJQR0xOIiBjb250ZW50cz0iMi03Ij4mI3hBMDsNCgkJCTwvdGQ+DQogICAgICAgIDx0ZCB3aWR0aD0iNjE1IiBjb2xzcGFuPSIyIiB2YWxpZ249InRvcCI+JiN4QTA7JiN4QTA7JiN4QTA7JiN4QTA7JiN4QTA7JiN4QTA7JiN4QTA7PHU+U2VjLjwvdT48dT4mI3hBMDs8L3U+PHU+MTQ4LjAwNC48L3U+PHU+JiN4QTA7PC91Pjx1PiYjeEEwOzwvdT48dT5MSU1JVEFUSU9OIE9OIEZPUlVNIE5PTiBDT05WRU5JRU5TLiAgSWYgYSA8L3U+PC90ZD4NCiAgICAgIDwvdHI+DQogICAgICA8dHI+DQogICAgICAgIDx0ZCB3aWR0aD0iNjUiIHZhbGlnbj0idG9wIj4NCiAgICAgICAgICA8TUVUQSBuYW1lPSJQR0xOIiBjb250ZW50cz0iMi04Ij4mI3hBMDsNCgkJCTwvdGQ+DQogICAgICAgIDx0ZCB3aWR0aD0iNjE1IiBjb2xzcGFuPSIyIiB2YWxpZ249InRvcCI+PHU+cmVzaWRlbnQgb2YgdGhpcyBzdGF0ZSBjb21tZW5jZXMgYW4gYWN0aW9uIGluIHRoaXMgc3RhdGUsIGEgY291cnQgPC91PjwvdGQ+DQogICAgICA8L3RyPg0KICAgICAgPHRyPg0KICAgICAgICA8dGQgd2lkdGg9IjY1IiB2YWxpZ249InRvcCI+DQogICAgICAgICAgPE1FVEEgbmFtZT0iUEdMTiIgY29udGVudHM9IjItOSI+JiN4QTA7DQoJCQk8L3RkPg0KICAgICAgICA8dGQgd2lkdGg9IjYxNSIgY29sc3Bhbj0iMiIgdmFsaWduPSJ0b3AiPjx1Pm1heSBub3QgZ3JhbnQgYSBtb3Rpb24gZm9yIGZvcnVtIG5vbiBjb252ZW5pZW5zIGlmIHRoZSBmb3JlaWduIGxhdyA8L3U+PC90ZD4NCiAgICAgIDwvdHI+DQogICAgICA8dHI+DQogICAgICAgIDx0ZCB3aWR0aD0iNjUiIHZhbGlnbj0idG9wIj4NCiAgICAgICAgICA8TUVUQSBuYW1lPSJQR0xOIiBjb250ZW50cz0iMi0xMCI+JiN4QTA7DQoJCQk8L3RkPg0KICAgICAgICA8dGQgd2lkdGg9IjYxNSIgY29sc3Bhbj0iMiIgdmFsaWduPSJ0b3AiPjx1PnRoYXQgd291bGQgYmUgYXBwbGllZCB0byB0aGUgZGlzcHV0ZSBpbiB0aGUgZm9ydW0gdG8gd2hpY2ggdGhlIDwvdT48L3RkPg0KICAgICAgPC90cj4NCiAgICAgIDx0cj4NCiAgICAgICAgPHRkIHdpZHRoPSI2NSIgdmFsaWduPSJ0b3AiPg0KICAgICAgICAgIDxNRVRBIG5hbWU9IlBHTE4iIGNvbnRlbnRzPSIyLTExIj4mI3hBMDsNCgkJCTwvdGQ+DQogICAgICAgIDx0ZCB3aWR0aD0iNjE1IiBjb2xzcGFuPSIyIiB2YWxpZ249InRvcCI+PHU+bW92aW5nIHBhcnR5IHNlZWtzIHRvIGhhdmUgdGhlIGFjdGlvbiByZW1vdmVkIHdvdWxkLCBhcyBhcHBsaWVkLCA8L3U+PC90ZD4NCiAgICAgIDwvdHI+DQogICAgICA8dHI+DQogICAgICAgIDx0ZCB3aWR0aD0iNjUiIHZhbGlnbj0idG9wIj4NCiAgICAgICAgICA8TUVUQSBuYW1lPSJQR0xOIiBjb250ZW50cz0iMi0xMiI+JiN4QTA7DQoJCQk8L3RkPg0KICAgICAgICA8dGQgd2lkdGg9IjYxNSIgY29sc3Bhbj0iMiIgdmFsaWduPSJ0b3AiPjx1PnZpb2xhdGUgYSByaWdodCBndWFyYW50ZWVkIGJ5IHRoZSBVbml0ZWQgU3RhdGVzIENvbnN0aXR1dGlvbiBvciB0aGUgPC91PjwvdGQ+DQogICAgICA8L3RyPg0KICAgICAgPHRyPg0KICAgICAgICA8dGQgd2lkdGg9IjY1IiB2YWxpZ249InRvcCI+DQogICAgICAgICAgPE1FVEEgbmFtZT0iUEdMTiIgY29udGVudHM9IjItMTMiPiYjeEEwOw0KCQkJPC90ZD4NCiAgICAgICAgPHRkIHdpZHRoPSI2MTUiIGNvbHNwYW49IjIiIHZhbGlnbj0idG9wIj48dT5jb25zdGl0dXRpb24gb2YgdGhpcyBzdGF0ZS48L3U+PC90ZD4NCiAgICAgIDwvdHI+DQogICAgICA8dHI+DQogICAgICAgIDx0ZCB3aWR0aD0iNjUiIHZhbGlnbj0idG9wIj4NCiAgICAgICAgICA8TUVUQSBuYW1lPSJQR0xOIiBjb250ZW50cz0iMi0xNCI+JiN4QTA7DQoJCQk8L3RkPg0KICAgICAgICA8dGQgd2lkdGg9IjYxNSIgY29sc3Bhbj0iMiIgdmFsaWduPSJ0b3AiPiYjeEEwOyYjeEEwOyYjeEEwOyYjeEEwOyYjeEEwOyYjeEEwOyYjeEEwO1NFQ1RJT04mI3hBMDsyLiYjeEEwOyYjeEEwOyhhKSAgU2VjdGlvbiAxNDguMDAyLCBDaXZpbCBQcmFjdGljZSBhbmQgPC90ZD4NCiAgICAgIDwvdHI+DQogICAgICA8dHI+DQogICAgICAgIDx0ZCB3aWR0aD0iNjUiIHZhbGlnbj0idG9wIj4NCiAgICAgICAgICA8TUVUQSBuYW1lPSJQR0xOIiBjb250ZW50cz0iMi0xNSI+JiN4QTA7DQoJCQk8L3RkPg0KICAgICAgICA8dGQgd2lkdGg9IjYxNSIgY29sc3Bhbj0iMiIgdmFsaWduPSJ0b3AiPlJlbWVkaWVzIENvZGUsIGFzIGFkZGVkIGJ5IHRoaXMgQWN0LCBhcHBsaWVzIG9ubHkgdG8gYSBydWxpbmcgb3IgPC90ZD4NCiAgICAgIDwvdHI+DQogICAgICA8dHI+DQogICAgICAgIDx0ZCB3aWR0aD0iNjUiIHZhbGlnbj0idG9wIj4NCiAgICAgICAgICA8TUVUQSBuYW1lPSJQR0xOIiBjb250ZW50cz0iMi0xNiI+JiN4QTA7DQoJCQk8L3RkPg0KICAgICAgICA8dGQgd2lkdGg9IjYxNSIgY29sc3Bhbj0iMiIgdmFsaWduPSJ0b3AiPmRlY2lzaW9uIHRoYXQgYmVjb21lcyBmaW5hbCBvbiBvciBhZnRlciB0aGUgZWZmZWN0aXZlIGRhdGUgb2YgdGhpcyA8L3RkPg0KICAgICAgPC90cj4NCiAgICAgIDx0cj4NCiAgICAgICAgPHRkIHdpZHRoPSI2NSIgdmFsaWduPSJ0b3AiPg0KICAgICAgICAgIDxNRVRBIG5hbWU9IlBHTE4iIGNvbnRlbnRzPSIyLTE3Ij4mI3hBMDsNCgkJCTwvdGQ+DQogICAgICAgIDx0ZCB3aWR0aD0iNjE1IiBjb2xzcGFuPSIyIiB2YWxpZ249InRvcCI+QWN0LiAgQSBydWxpbmcgb3IgZGVjaXNpb24gdGhhdCBiZWNvbWVzIGZpbmFsIGJlZm9yZSB0aGUgZWZmZWN0aXZlIDwvdGQ+DQogICAgICA8L3RyPg0KICAgICAgPHRyPg0KICAgICAgICA8dGQgd2lkdGg9IjY1IiB2YWxpZ249InRvcCI+DQogICAgICAgICAgPE1FVEEgbmFtZT0iUEdMTiIgY29udGVudHM9IjItMTgiPiYjeEEwOw0KCQkJPC90ZD4NCiAgICAgICAgPHRkIHdpZHRoPSI2MTUiIGNvbHNwYW49IjIiIHZhbGlnbj0idG9wIj5kYXRlIG9mIHRoaXMgQWN0IGFuZCBhbnkgYXBwZWFsIG9mIHRoYXQgcnVsaW5nIG9yIGRlY2lzaW9uIGFyZSA8L3RkPg0KICAgICAgPC90cj4NCiAgICAgIDx0cj4NCiAgICAgICAgPHRkIHdpZHRoPSI2NSIgdmFsaWduPSJ0b3AiPg0KICAgICAgICAgIDxNRVRBIG5hbWU9IlBHTE4iIGNvbnRlbnRzPSIyLTE5Ij4mI3hBMDsNCgkJCTwvdGQ+DQogICAgICAgIDx0ZCB3aWR0aD0iNjE1IiBjb2xzcGFuPSIyIiB2YWxpZ249InRvcCI+Z292ZXJuZWQgYnkgdGhlIGxhdyBpbiBlZmZlY3QgaW1tZWRpYXRlbHkgYmVmb3JlIHRoZSBlZmZlY3RpdmUgZGF0ZSA8L3RkPg0KICAgICAgPC90cj4NCiAgICAgIDx0cj4NCiAgICAgICAgPHRkIHdpZHRoPSI2NSIgdmFsaWduPSJ0b3AiPg0KICAgICAgICAgIDxNRVRBIG5hbWU9IlBHTE4iIGNvbnRlbnRzPSIyLTIwIj4mI3hBMDsNCgkJCTwvdGQ+DQogICAgICAgIDx0ZCB3aWR0aD0iNjE1IiBjb2xzcGFuPSIyIiB2YWxpZ249InRvcCI+b2YgdGhpcyBBY3QsIGFuZCB0aGF0IGxhdyBpcyBjb250aW51ZWQgaW4gZWZmZWN0IGZvciB0aGF0IHB1cnBvc2UuPC90ZD4NCiAgICAgIDwvdHI+DQogICAgICA8dHI+DQogICAgICAgIDx0ZCB3aWR0aD0iNjUiIHZhbGlnbj0idG9wIj4NCiAgICAgICAgICA8TUVUQSBuYW1lPSJQR0xOIiBjb250ZW50cz0iMi0yMSI+JiN4QTA7DQoJCQk8L3RkPg0KICAgICAgICA8dGQgd2lkdGg9IjYxNSIgY29sc3Bhbj0iMiIgdmFsaWduPSJ0b3AiPiYjeEEwOyYjeEEwOyYjeEEwOyYjeEEwOyYjeEEwOyYjeEEwOyYjeEEwOyhiKSYjeEEwOyYjeEEwO1NlY3Rpb24gMTQ4LjAwMywgQ2l2aWwgUHJhY3RpY2UgYW5kIFJlbWVkaWVzIENvZGUsIGFzIDwvdGQ+DQogICAgICA8L3RyPg0KICAgICAgPHRyPg0KICAgICAgICA8dGQgd2lkdGg9IjY1IiB2YWxpZ249InRvcCI+DQogICAgICAgICAgPE1FVEEgbmFtZT0iUEdMTiIgY29udGVudHM9IjItMjIiPiYjeEEwOw0KCQkJPC90ZD4NCiAgICAgICAgPHRkIHdpZHRoPSI2MTUiIGNvbHNwYW49IjIiIHZhbGlnbj0idG9wIj5hZGRlZCBieSB0aGlzIEFjdCwgYXBwbGllcyBvbmx5IHRvIGEgY29udHJhY3QgZW50ZXJlZCBpbnRvIG9uIG9yIDwvdGQ+DQogICAgICA8L3RyPg0KICAgICAgPHRyPg0KICAgICAgICA8dGQgd2lkdGg9IjY1IiB2YWxpZ249InRvcCI+DQogICAgICAgICAgPE1FVEEgbmFtZT0iUEdMTiIgY29udGVudHM9IjItMjMiPiYjeEEwOw0KCQkJPC90ZD4NCiAgICAgICAgPHRkIHdpZHRoPSI2MTUiIGNvbHNwYW49IjIiIHZhbGlnbj0idG9wIj5hZnRlciB0aGUgZWZmZWN0aXZlIGRhdGUgb2YgdGhpcyBBY3QuICBBIGNvbnRyYWN0IGVudGVyZWQgaW50byA8L3RkPg0KICAgICAgPC90cj4NCiAgICAgIDx0cj4NCiAgICAgICAgPHRkIHdpZHRoPSI2NSIgdmFsaWduPSJ0b3AiPg0KICAgICAgICAgIDxNRVRBIG5hbWU9IlBHTE4iIGNvbnRlbnRzPSIyLTI0Ij4mI3hBMDsNCgkJCTwvdGQ+DQogICAgICAgIDx0ZCB3aWR0aD0iNjE1IiBjb2xzcGFuPSIyIiB2YWxpZ249InRvcCI+YmVmb3JlIHRoZSBlZmZlY3RpdmUgZGF0ZSBvZiB0aGlzIEFjdCBpcyBnb3Zlcm5lZCBieSB0aGUgbGF3IGluIDwvdGQ+DQogICAgICA8L3RyPg0KICAgICAgPHRyPg0KICAgICAgICA8dGQgd2lkdGg9IjY1IiB2YWxpZ249InRvcCI+DQogICAgICAgICAgPE1FVEEgbmFtZT0iUEdMTiIgY29udGVudHM9IjItMjUiPiYjeEEwOw0KCQkJPC90ZD4NCiAgICAgICAgPHRkIHdpZHRoPSI2MTUiIGNvbHNwYW49IjIiIHZhbGlnbj0idG9wIj5lZmZlY3QgaW1tZWRpYXRlbHkgYmVmb3JlIHRoYXQgZGF0ZSwgYW5kIHRoYXQgbGF3IGlzIGNvbnRpbnVlZCBpbiA8L3RkPg0KICAgICAgPC90cj4NCiAgICAgIDx0cj4NCiAgICAgICAgPHRkIHdpZHRoPSI2NSIgdmFsaWduPSJ0b3AiPg0KICAgICAgICAgIDxNRVRBIG5hbWU9IlBHTE4iIGNvbnRlbnRzPSIyLTI2Ij4mI3hBMDsNCgkJCTwvdGQ+DQogICAgICAgIDx0ZCB3aWR0aD0iNjE1IiBjb2xzcGFuPSIyIiB2YWxpZ249InRvcCI+ZWZmZWN0IGZvciB0aGF0IHB1cnBvc2UuPC90ZD4NCiAgICAgIDwvdHI+DQogICAgICA8dHI+DQogICAgICAgIDx0ZCB3aWR0aD0iNjUiIHZhbGlnbj0idG9wIj4NCiAgICAgICAgICA8TUVUQSBuYW1lPSJQR0xOIiBjb250ZW50cz0iMi0yNyI+JiN4QTA7DQoJCQk8L3RkPg0KICAgICAgICA8dGQgd2lkdGg9IjYxNSIgY29sc3Bhbj0iMiIgdmFsaWduPSJ0b3AiPiYjeEEwOyYjeEEwOyYjeEEwOyYjeEEwOyYjeEEwOyYjeEEwOyYjeEEwOyhjKSYjeEEwOyYjeEEwO1NlY3Rpb24gMTQ4LjAwNCwgQ2l2aWwgUHJhY3RpY2UgYW5kIFJlbWVkaWVzIENvZGUsIGFzIDwvdGQ+DQogICAgICA8L3RyPg0KICAgICAgPHRyPg0KICAgICAgICA8dGQgd2lkdGg9IjY1IiB2YWxpZ249InRvcCI+DQogICAgICAgICAgPE1FVEEgbmFtZT0iUEdMTiIgY29udGVudHM9IjMtMSI+JiN4QTA7DQoJCQk8L3RkPg0KICAgICAgICA8dGQgd2lkdGg9IjYxNSIgY29sc3Bhbj0iMiIgdmFsaWduPSJ0b3AiPmFkZGVkIGJ5IHRoaXMgQWN0LCBhcHBsaWVzIG9ubHkgdG8gYSBtb3Rpb24gZm9yIGZvcnVtIG5vbiBjb252ZW5pZW5zIDwvdGQ+DQogICAgICA8L3RyPg0KICAgICAgPHRyPg0KICAgICAgICA8dGQgd2lkdGg9IjY1IiB2YWxpZ249InRvcCI+DQogICAgICAgICAgPE1FVEEgbmFtZT0iUEdMTiIgY29udGVudHM9IjMtMiI+JiN4QTA7DQoJCQk8L3RkPg0KICAgICAgICA8dGQgd2lkdGg9IjYxNSIgY29sc3Bhbj0iMiIgdmFsaWduPSJ0b3AiPm1hZGUgb24gb3IgYWZ0ZXIgdGhlIGVmZmVjdGl2ZSBkYXRlIG9mIHRoaXMgQWN0LiAgQSBtb3Rpb24gZm9yIGZvcnVtIDwvdGQ+DQogICAgICA8L3RyPg0KICAgICAgPHRyPg0KICAgICAgICA8dGQgd2lkdGg9IjY1IiB2YWxpZ249InRvcCI+DQogICAgICAgICAgPE1FVEEgbmFtZT0iUEdMTiIgY29udGVudHM9IjMtMyI+JiN4QTA7DQoJCQk8L3RkPg0KICAgICAgICA8dGQgd2lkdGg9IjYxNSIgY29sc3Bhbj0iMiIgdmFsaWduPSJ0b3AiPm5vbiBjb252ZW5pZW5zIG1hZGUgYmVmb3JlIHRoZSBlZmZlY3RpdmUgZGF0ZSBvZiB0aGlzIEFjdCBpcyA8L3RkPg0KICAgICAgPC90cj4NCiAgICAgIDx0cj4NCiAgICAgICAgPHRkIHdpZHRoPSI2NSIgdmFsaWduPSJ0b3AiPg0KICAgICAgICAgIDxNRVRBIG5hbWU9IlBHTE4iIGNvbnRlbnRzPSIzLTQiPiYjeEEwOw0KCQkJPC90ZD4NCiAgICAgICAgPHRkIHdpZHRoPSI2MTUiIGNvbHNwYW49IjIiIHZhbGlnbj0idG9wIj5nb3Zlcm5lZCBieSB0aGUgbGF3IGluIGVmZmVjdCBpbW1lZGlhdGVseSBiZWZvcmUgdGhhdCBkYXRlLCBhbmQgdGhhdCA8L3RkPg0KICAgICAgPC90cj4NCiAgICAgIDx0cj4NCiAgICAgICAgPHRkIHdpZHRoPSI2NSIgdmFsaWduPSJ0b3AiPg0KICAgICAgICAgIDxNRVRBIG5hbWU9IlBHTE4iIGNvbnRlbnRzPSIzLTUiPiYjeEEwOw0KCQkJPC90ZD4NCiAgICAgICAgPHRkIHdpZHRoPSI2MTUiIGNvbHNwYW49IjIiIHZhbGlnbj0idG9wIj5sYXcgaXMgY29udGludWVkIGluIGVmZmVjdCBmb3IgdGhhdCBwdXJwb3NlLjwvdGQ+DQogICAgICA8L3RyPg0KICAgICAgPHRyPg0KICAgICAgICA8dGQgd2lkdGg9IjY1IiB2YWxpZ249InRvcCI+DQogICAgICAgICAgPE1FVEEgbmFtZT0iUEdMTiIgY29udGVudHM9IjMtNiI+JiN4QTA7DQoJCQk8L3RkPg0KICAgICAgICA8dGQgd2lkdGg9IjYxNSIgY29sc3Bhbj0iMiIgdmFsaWduPSJ0b3AiPiYjeEEwOyYjeEEwOyYjeEEwOyYjeEEwOyYjeEEwOyYjeEEwOyYjeEEwO1NFQ1RJT04mI3hBMDszLiYjeEEwOyYjeEEwO1RoaXMgQWN0IHRha2VzIGVmZmVjdCBTZXB0ZW1iZXIgMSwgMjAxNy48L3RkPg0KICAgICAgPC90cj4NCiAgICA8L3RhYmxlPg0KICA=',
        ];

        $this->assertEquals($expected, $stateList);
    }

    public function testGetAmmendment()
    {
        $stateList = $this->service->getAmendment(647508);

        $expected = [];

        $this->assertEquals($expected, $stateList);
    }
}
