<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 024 24.09.17
 * Time: 22:31
 */

namespace AppBundle\Library\Vkontakte;
use AppBundle\Library\Vkontakte\Actions\create;
use AppBundle\Library\Vkontakte\Actions\get;

/**
 * Class groups
 * @package AppBundle\Library\Vkontakte
 * @see main_class
 * @uses VkApiHelper::setMethod()
 */
class groups extends VkApiHelper
{

    /**
     * @var string $method_action
     * @return create|get|array
     */
    public function setMethodAction($method_action){
        $method = 'AppBundle\Library\Vkontakte\Actions\\' . $method_action;
        //$action = new $method ((new \ReflectionClass($this))->getShortName());
        //if ($action instanceof groups) {
        if (class_exists($method)){
            return new $method ((new \ReflectionClass($this))->getShortName());
        }
        return ['error' => 'Called method.action does not exist!'];
    }


}