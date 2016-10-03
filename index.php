<?php
/**
 * Liten - PHP 5 micro framework
 * 
 * @link        https://www.litenframework.com
 * @since       1.0.0
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
/**
 * Step 1: Initial constants defined
 * 
 * Several constants defined in order to help
 * with the autoloader and the loading of other
 * needed functions and files.
 */
defined('DS') or define('DS', DIRECTORY_SEPARATOR);
defined('BASE_PATH') or define('BASE_PATH', __DIR__ . DS);

/**
 * Step 2: Require the Bootstrap
 *
 * The bootstrap includes defines as well as autoloader
 * in order to have a working install of Liten.
 */
require( BASE_PATH . 'Liten' . DS . 'Bootstrap.php');

/**
 * Step 3: Instantiate a Liten application
 *
 * This example instantiates a Liten application using
 * its default settings. However, you can configure
 * your Liten application by passing an associative array
 * of setting names and values into the application constructor.
 */
$app = new \Liten\Liten();

/**
 * Step 4: Include the routes needed
 */
// GET route
$app->get('/', function () {
    $template = <<<EOT
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Liten Framework PHP 5.4.x</title>
<style type="text/css">
  
 body {
   background: #f1f4f7;
   padding: 0;
   margin: 0;
   } 
  
a {
  color: #008ae1 !important;
  text-decoration: none !important;
  }
  
a:hover {
  color: #333333 !important;
  text-decoration: underline !important;
  }
p, ol {
   font-size: 1.2em;
}
</style>
</head>
<body style="background-color:#ffffff;" leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
  <table border="0" cellspacing="0" cellpadding="0" width="100%" align="center">
    <tbody>
      <tr>
      <td style="background-color: #ffffff; width: 100%;">
        <table style="width: 600px; margin: 0 auto; border-bottom: 1px solid #e6e6e6;" border="0" cellspacing="0" cellpadding="0" align="center" class="full">
          <tr>
            <td width="100%" valign="middle" height="94">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
		<tr>
			<td height="12">&nbsp;</td>
		</tr>
                <tr>
                  <td class="highlight pdTp32 pdBt16" style="margin-top: 0;margin-left: 0;margin-right: 0;margin-bottom: 0;padding-top: 32px;padding-bottom: 16px;padding-left: 16px;padding-right: 16px;border-collapse: collapse;border-spacing: 0;-webkit-text-size-adjust: none;font-family: Arial, Helvetica, sans-serif;width: 512px;text-align: center;background-color: #f6f6f7;"><h1 style="margin-top: 0;margin-left: 0;margin-right: 0;margin-bottom: 5px;padding-top: 0;padding-bottom: 0;padding-left: 0;padding-right: 0;-webkit-text-size-adjust: none;font-family: Arial, Helvetica, sans-serif;font-size: 24px;line-height: 36px;font-weight: bold;color: #465059;"><span style="color: #465059;">Liten Framework</span></h1></td>
                </tr>
		<tr>
			<td height="12">&nbsp;</td>
		</tr>
              </table>
            </td>
          </tr>
        </table>
        <table style="width: 600px; margin: 0 auto; font-family: arial,helvetica,sans-serif; font-size: 13px; color: #333; line-height: 19px; background: #ffffff;" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF" class="full">
          <tr>
            <td class="maincol" valign="top" width="100%">
              <table cellpadding="0" cellspacing="0" border="0" style="padding: 0;" width="100%">
            		<tr>
            		<td height="24" width="100%">&nbsp;</td>
            		</tr>
                <tr>
                  <td>
			<div data-signal-editable="Maincol" data-signal-content-type="layout"></div>
      <!-- maincol -->
                        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="font-family: arial,helvetica,sans-serif; font-size: 11px; color: #555; line-height: 17px;">
                  <tr>
                  
                  <td colspan="3" width="100%" valign="top" height="24">
                   <p>You have successfully installed the Liten Framework. Liten is a small and simple micro framework that can be used to easily create restful applications. Before getting started, you should familiarize yourself with the <a href="https://www.litenframework.com/"><strong>online documentation</strong></a>. If you have any questions, feel free to leave a comment on the main site or at Github.</p>

					<p>After reading the documentation, you should familiarize yourself with the following files:</p>
					
					<ol>
					<li>index.php is the main application file.</li>
					<li>/Liten/Bootstrap.php is the initialization file</li>
					</ol>
					
					<p>I would love to see Liten turn into a great framework. It's creation is the result of some of the good stuff from other micro frameworks. Want to get involved? I welcome you to participate on the <a href="https://www.litenframework.com/"><strong>main site</strong></a> as well as the <a href="https://github.com/parkerj/Liten"><strong>Github</strong></a> repository.</p>

            	</p>
                        </td>
                      </tr>
</table>

		<div data-signal-editable="Sociable" data-signal-content-type="layout" class="sociable"></div>	

            </td>
                </tr>
              </table>
                 


            </td>
          </tr>
      </table>

      </td>
    </tr>
  </tbody>
</table>
</body>
</html>
EOT;
    echo $template;
}
);

// POST route
$app->post('/post', function () {
    echo 'Example of a post route.';
}
);

// DELETE route
$app->delete('/delete', function () {
    echo 'Example of a delete route.';
}
);

/**
 * Step 5: Run the Liten application
 *
 * This method should be called last. This executes the Liten application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();
