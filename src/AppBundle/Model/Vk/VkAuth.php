<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 022 22.09.17
 * Time: 10:27
 */

namespace AppBundle\Model\Vk;

use AppBundle\Helpers\CurlGetter;

// Deprecated
// Need to refactor for universal script for all of social services: fb, vk, tw, gp, ok etc
class VkAuth
{
    /**
     * Vk auth service url
     * @var string
     */
    private $vk_auth = 'https://oauth.vk.com/';

    /**
     * Vk App secret key
     * @var string
     */
    private $client_secret;

    /**
     * Default parameters
     * @var array
     */
    private $params = array(
        'client_id' =>      '',
        'redirect_uri' =>   '',
        'display' =>        'popup',
        'scope' =>          'friends,photos,video,status,notes,docs,groups,stats,email',
        'response_type' =>  'code',
        'v' =>              '5.68'
    );

    // Methods
    public function __construct($vk_app_config, $permissions = '')
    {
        $this->params['client_id'] = $vk_app_config['app_id'];
        $this->params['redirect_uri'] = $vk_app_config['redirect_uri'];
        $this->client_secret = $vk_app_config['client_secret'];
        if (isset($permissions)){
            $this->params['scope'] = $permissions;
        }
    }

    /**
     * Get first step authorisation code
     * @return string
     */
    public function GetAuthCodeUrl(){
        $auth_url = $this->vk_auth . 'authorize?' . http_build_query($this->params);
        return $auth_url;
    }

    /**
     * Do second step of Vk authorisation, create url and get user token
     * @param $code
     * @return mixed
     */
    public function GetUserToken($code){
        $token_url = $this->vk_auth . 'access_token?client_id=' . $this->params['client_id'] .
            '&client_secret=' . $this->client_secret .
            '&redirect_uri=' . $this->params['redirect_uri'] .
            '&code=' . $code;
        $result = CurlGetter::GetByCurl($token_url);
        return $result;
    }

    public function GetAndFlushUserInfo($user_id, $token){

    }


}