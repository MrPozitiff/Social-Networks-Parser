<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 025 25.09.17
 * Time: 1:11
 */

namespace AppBundle\Library\Vkontakte\Actions;

use AppBundle\Library\Vkontakte\groups;

/** Method groups.create
 * Создает группу
 * Class create
 * @package AppBundle\Library\Vkontakte\Actions
 * @see main_class
 * @uses groups::setMethodAction()
 */
class create extends groups
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var 'string'
     */
    private $type;

    /**
     * @var integer
     */
    private $subtype;

    /**
     * @var integer
     */
    private $public_category;

    private $access_token = '';

    private $requested_method;

    public function __construct($requested_method)
    {
        $this->requested_method = $requested_method . '.'. (new \ReflectionClass($this))->getShortName();
    }

    /**
     * @param $name
     * @param $argument
     * @return $this
     * @method mixed set_($name, $argument)
     */

    public function __call($name, $argument)
    {
        // присвоение переменной значения
        if (substr($name,0,4) == 'set_')
        {
            $property = substr($name,4);
            $this->$property = $argument[0];
            // добавление значения в массив
        }
        else if (substr($name,0,4) == 'add_')
        {
            $property = substr($name,4);
            array_push($this->$property, $argument);
        }
        // этот метод тоже может быть использован в цепочке вызовов
        return $this;
    }

    public function prepareQuery(){
        if( !isset($this->title)){
            return ['error' => 'Missing required parameter "Title"'];
        }
        if (!isset($this->access_token)){
            return ['error' => 'Missing required parameter "Access Token"'];
        }
        $params = array();
        $vars = get_object_vars($this);
        $parent_vals = $this->getParentVal();
        foreach ($vars as $key => $var){
            if (isset($var) && $key != 'requested_method'){
                $params[$key] = $var;
            }
        }
        $params['v'] = $parent_vals['api_version'];
        $url = $parent_vals['url'] . $this->requested_method . '?' . http_build_query($params);
        return $url;
    }
    /**
     * @param string $title
     * @return create
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string $description
     * @return create
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param mixed $type
     * @return create
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param int $subtype
     * @return create
     */
    public function setSubtype($subtype)
    {
        $this->subtype = $subtype;
        return $this;
    }

    /**
     * @param int $public_category
     * @return create
     */
    public function setPublicCategory($public_category)
    {
        $this->public_category = $public_category;
        return $this;
    }



}