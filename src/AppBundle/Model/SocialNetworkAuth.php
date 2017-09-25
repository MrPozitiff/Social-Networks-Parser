<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 022 22.09.17
 * Time: 10:27
 */

namespace AppBundle\Model;

use AppBundle\Entity\SocialNetworks;
use AppBundle\Helpers\CurlGetter;

// Need to refactor for universal script for all of social services: fb, vk, tw, gp, ok etc
class SocialNetworkAuth
{
    /**
     * Social network auth service url
     * @var string
     */
    private $auth_url;

    /**
     * @var string
     */
    private $auth_url_path;

    /**
     * @var string
     */
    private $api_url;

    /**
     * @var string
     */
    private $token_url_path;

    /**
     * @var string
     */
    private $aplication_id;

    /**
     * @var string
     */
    private $aplication_secret;

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
    public function __construct(SocialNetworks $name)
    {
        $soc_net_param = new SocialNetworks();
        $soc_net_param->getSocnetName();
    }

    /**
     * Get first step authorisation code
     * @return string
     */
    public function GetAuthCodeUrl(){
        $auth_url = $this->auth_url . 'authorize?' . urldecode(http_build_query($this->params));
        return $auth_url;
    }

    /**
     * Do second step of Vk authorisation, create url and get user token
     * @param $code
     * @return mixed
     */
    public function GetUserToken($code){
        $token_url = $this->auth_url . 'access_token?client_id=' . $this->params['client_id'] .
            '&client_secret=' . $this->client_secret .
            '&redirect_uri=' . $this->params['redirect_uri'] .
            '&code=' . $code;
        $result = CurlGetter::GetByCurl($token_url);
        return $result;
    }

    public function GetAndFlushUserInfo($user_id, $token){

    }


}