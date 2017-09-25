<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 024 24.09.17
 * Time: 21:03
 */

namespace AppBundle\Library\Vkontakte;


use AppBundle\Helpers\CurlGetter;

/**
 * Class VkApiHelper
 * @package AppBundle\Library\Vkontakte
 * @todo complete classes for all used method of Vk API
 */
class VkApiHelper
{

    private $url = 'https://api.vk.com/method/';

    private $api_version = '5.62';

    /**
     * @return groups|users|array
     */
    public function setMethod($method){
        $method_class = '\AppBundle\Library\Vkontakte\\' . $method;
        //$action = new $method ();
        if (class_exists($method_class)){
        //if ($action instanceof VkApiHelper) {
            return new $method_class;
        }
        return ['error' => 'Called method does not exist!'];
    }

    public function execute($url){
        $result = CurlGetter::GetByCurl($url);
        return $result;
    }

    protected function getParentVal(){
        return $vars = get_object_vars($this);

    }

}