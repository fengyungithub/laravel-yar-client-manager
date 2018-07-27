<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/27
 * Time: 12:06
 */

namespace Fengyun\YarClient;


class YarClientManager
{

    public function api($apiName, $params = array()) {

        //call_user_func_array
        $client = $this->factory($apiName);
        if ($client) {
            return call_user_func_array(
                array($client, $apiName),
                $params
            );
        }

        return false;
    }

    public function factory($apiName) {

        $config = config('yar_client');

        if (!in_array($apiName, $config['api_host_map'])) {
            return false;
        }

        $apiHostName = $config['api_host_map'][$apiName];
        $apiHostAddr = $config['hosts'][$apiHostName];

        return new \Yar_Client($apiHostAddr);
    }
}