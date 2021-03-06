<?php
/**
 */
namespace Ksyun\Service;

use Ksyun\Base\V4Curl;
class Ksvs extends V4Curl
{
    protected function getConfig()
    {
        return [
            'host' => 'http://ksvs.cn-beijing-6.api.ksyun.com',
            'timeout' => 5,
            'config' => [
                'headers' => [
                    'Accept' => 'application/json'
                ],
                'v4_credentials' => [
                    'service' => 'ksvs',
                ],
            ],
        ];
    }

    public function request($api, array $config = [], $region = 'cn-beijing-6')
    {
        $config['v4_credentials']['region'] = $region;
        $config['replace']['region'] = $region;
        return parent::request($api, $config);
    }

    public function getSign()
    {
        return $this->sign;
    }

    protected $apiList = [
        'KSDKAuth' => [
            'url' => '/',
            'method' => 'get',
            'config' => [
                'query' => [
                    'Action' => 'KSDKAuth',
                    'Version' => '2017-04-01'
                ]
            ],
        ],
    ];
}
