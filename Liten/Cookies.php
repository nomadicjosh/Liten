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
if (!defined('BASE_PATH'))
    exit('No direct script access allowed');

class Cookies
{

    /**
     * Liten application object
     * @var object|callable
     */
    protected $_app;

    /**
     * Regular expression for matching and validating a MAC address
     * @var string
     */
    protected $_valid_mac = "([0-9A-F]{2}[:-]){5}([0-9A-F]{2})";

    /**
     * An array of valid MAC address characters
     * @var array
     * @formatter:off
     */
    protected $_mac_address_vals = [
        "0", "1", "2", "3", "4", "5", "6", "7",
        "8", "9", "A", "B", "C", "D", "E", "F"
    ];

    public function __construct($private_key = null)
    {
        $this->_app = \Liten\Liten::getInstance();
    }

    /**
     * Retrieves a set cookie.
     *
     * @since 1.0.0
     * @return string Returns cookie if valid
     * 
     */
    public function get($key)
    {
        if ($this->verifyCookie($key)) {
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
        $value = $this->buildCookie($value);
        // @formatter:off
        return setcookie(
            $key, $value, time() + $this->_app->config('cookies.lifetime'), $this->_app->config('cookies.path'), $this->_app->config('cookies.domain'), $this->_app->config('cookies.secure'), $this->_app->config('cookies.httponly')
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
        // @formatter:off
        return setcookie(
            $key, '', time() - 86400, $this->_app->config('cookies.path'), $this->_app->config('cookies.domain'), $this->_app->config('cookies.secure'), $this->_app->config('cookies.httponly')
        );
    }

    /**
     * @return string generated MAC address
     */
    public function generateMacAddress()
    {
        $vals = $this->_mac_address_vals;
        if (count($vals) >= 1) {
            $mac = array("00"); // set first two digits manually
            while (count($mac) < 6) {
                shuffle($vals);
                $mac[] = $vals[0] . $vals[1];
            }
            $mac = implode(":", $mac);
        }
        return $mac;
    }

    /**
     * Make sure the provided MAC address is in the correct format
     * @param string $mac
     * @return bool true if valid; otherwise false
     */
    public function validateMacAddress($mac)
    {
        return (bool) preg_match("/^" . $this->_valid_mac . "$/i", $mac);
    }

    /**
     * Generates a hardened cookie string with digest.
     *
     * @param string $data Cookie value: e.g. username or userID
     */
    public function buildCookie($data)
    {
        $expires = time() + $this->_app->config('cookies.lifetime');

        $string = sprintf("exp=%s&data=%s", urlencode($expires), urlencode($data));
        $mac = hash_hmac($this->_app->config('cookies.crypt'), $string, $this->_app->config('cookies.secret.key'));
        return $string . '&digest=' . urlencode($mac);
    }

    /**
     * Extracts the data from the cookie string. 
     * This does not verify the cookie! This is just so you can get the user's hash.
     *
     * @return string The data
     * */
    public function getCookieData($cookie)
    {
        parse_str($_COOKIE[$cookie], $vars);
        return $vars['data'];
    }

    /**
     * Verifies the expiry and MAC for the cookie
     *
     * @param string $cookie String from the client
     * @return void
     */
    public function verifyCookie($cookie)
    {
        $cookie = $_COOKIE[$cookie];

        parse_str($cookie, $vars);

        if (empty($vars['exp']) || $vars['exp'] < time()) {
            // The cookie has expired
            return false;
        }

        $mac = sprintf("exp=%s&data=%s", urlencode($vars['exp']), urlencode($vars['data']));
        $key = hash_hmac($this->_app->config('cookies.crypt'), $mac, $this->_app->config('cookies.secret.key'));

        if ($vars['digest'] != $key) {
            // The cookie has been compromised
            return false;
        }

        return true;
    }
}
