<?php namespace Liten;
/**
 * Liten - PHP 5 micro framework
 * 
 * @link        http://www.litenframework.com
 * @version     1.0.0
 * @package		Liten
 * 
 * The MIT License (MIT)
 * Copyright (c) 2015 Joshua Parker
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

if ( ! defined('BASE_PATH')) exit('No direct script access allowed');

/**
 * This class will change eventually once I figure
 * out how to integrate the code from my stateless
 * cookies class into this one for more secure cookies.
 */

class Cookies {
	
	protected $_val;
    
    public function __construct() {
    	$this->_val = \Liten\Liten::getInstance();
    }
	
	/**
     * Cookie Name
     *
     * @since 1.0.0
     * @return string Returns cookie if set
     * 
     */ 
    public function get($key) {
        if(isset($_COOKIE[$key])) {
            return $_COOKIE[$key];
        }
    }
    
    /**
     * Set the cookie
     *
     * @since 1.0.0
     * @return mixed
     * 
     */ 
    public function set($key, $value)
    {
        return setcookie( 
        				$key, 
        				$value, 
        				time() + $this->_val->config('cookies.lifetime'), 
        				$this->_val->config('cookies.path'), 
        				$this->_val->config('cookies.domain'), 
        				$this->_val->config('cookies.secure'), 
						$this->_val->config('cookies.httponly')
		);
    }
	
	/**
     * Unset the cookie
     *
     * @since 1.0.0
     * @return mixed
     * 
     */ 
    public function remove($key)
    {
        return setcookie( 
        				$key,
        				'', 
        				time() - 86400,
        				$this->_val->config('cookies.path'),
        				$this->_val->config('cookies.domain'), 
        				$this->_val->config('cookies.secure'), 
						$this->_val->config('cookies.httponly')
		);
    }

}