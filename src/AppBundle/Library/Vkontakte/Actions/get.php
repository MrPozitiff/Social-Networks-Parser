<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 025 25.09.17
 * Time: 1:11
 */

namespace AppBundle\Library\Vkontakte\Actions;

use AppBundle\Library\Vkontakte\groups;

/** Method groups.get
 * Возвращает список сообществ указанного пользователя.
 * Class create
 * @package AppBundle\Library\Vkontakte\Actions
 * @property-write mixed $name($argument)
 */
class get extends groups
{
    /**
     * @var integer
     */
    private $user_id;

    /**
     * @var string
     */
    private $extended = 0;

    /**
     * @var 'string'
     */
    private $filter = 'groups, publics';

    /**
     * @var 'string'
     */
    private $fields;

    /**
     * @var integer
     */
    private $ofset;

    /**
     * @var integer
     */
    private $count;

    private $access_token = '';

    private $requested_method;

    public function __construct($requested_method)
    {
        $this->requested_method = $requested_method . '.'. (new \ReflectionClass($this))->getShortName();
    }

    public function setParams($params){

    }

    public function setAccessToken($access_token ){
        $this->params['access_token'] = $access_token;
        return $this;
    }

    public function prepareQuery(){
        if( !isset($this->user_id)){
            return ['error' => 'Missing required parameter "User Id"'];
        }
        if (!isset($this->access_token)){
            return ['error' => 'Missing required parameter "Access Token"'];
        }

        $parent_vals = $this->getParentVal();

        $params['v'] = $parent_vals['api_version'];
        $url = $parent_vals['url'] . $this->requested_method . '?' . http_build_query($params);
        return $url;
    }

}