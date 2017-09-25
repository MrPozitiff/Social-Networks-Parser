<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 025 25.09.17
 * Time: 15:08
 */

namespace AppBundle\Library\Vkontakte;


class VkRequestConstructor
{
    private $request;

    public function setMethod($method){
        $this->api_url = 'https://oauth.vk.com/method/';

        $this->api_url = '';

    }

    public function setMethod($method){

    }

    function set($property_name, $property_value) {
        $this->{$property_name} = $property_value;
        return $this;
    }


}