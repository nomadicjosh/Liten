<?php if ( ! defined('BASE_PATH')) exit('No direct script access allowed'); ?>
            <?php $app = \Liten\Liten::getInstance(); ?>
            <?php $app->view->extend('_layouts/default'); ?>
            <?php $app->view->block('default'); ?>
            
	        <tr>
	          <td class="highlight pdTp32 pdBt16" style="margin-top: 0;margin-left: 0;margin-right: 0;margin-bottom: 0;padding-top: 32px;padding-bottom: 16px;padding-left: 16px;padding-right: 16px;border-collapse: collapse;border-spacing: 0;-webkit-text-size-adjust: none;font-family: Arial, Helvetica, sans-serif;width: 512px;text-align: center;background-color: #f6f6f7;"><h1 style="margin-top: 0;margin-left: 0;margin-right: 0;margin-bottom: 5px;padding-top: 0;padding-bottom: 0;padding-left: 0;padding-right: 0;-webkit-text-size-adjust: none;font-family: Arial, Helvetica, sans-serif;font-size: 24px;line-height: 36px;font-weight: bold;color: #465059;"><span style="color: #465059;">Welcome to Liten!</span></h1></td>
	          <!-- end .highlight--> 
	        </tr>
	        <tr>
	          <td class="eBody pdTp32" style="margin-top: 0;margin-left: 0;margin-right: 0;margin-bottom: 0;padding-top: 32px;padding-bottom: 0;padding-left: 16px;padding-right: 16px;border-collapse: collapse;border-spacing: 0;-webkit-text-size-adjust: none;font-family: Arial, Helvetica, sans-serif;width: 512px;color: #54565c;background-color: #ffffff;">
	            <p style="margin-top: 0;margin-left: 0;margin-right: 0;margin-bottom: 24px;padding-top: 0;padding-bottom: 0;padding-left: 0;padding-right: 0;-webkit-text-size-adjust: none;font-family: Arial, Helvetica, sans-serif;font-size: 14px;line-height: 22px;text-align: left;">
	            	<p>You have successfully installed the Liten Framework. Liten is small, simple and restful. Before getting started, you should familiarize yourself with the <a href="http://www.litenframework.com/"><strong>online documentation</strong></a>. If you have any questions, feel free to leave a comment on the wiki article you have questions about.</p>

					<p>After reading the documentation, you should familiarize yourself with the following files:</p>
					
					<ol>
					<li>index.php is the main application file.</li>
					<li>/Liten/Bootstrap.php is the initialization file</li>
					<li>/app/routers/api.router.php is a sample rest api</li>
					</ol>
					
					<p>The rest api router is heavily commented so it should be easy to understand how you can create intelligent restful api's with the proper HTTP responses.</p>
					
					<p>I would love to see Liten turn into a great framework. It's creation is the result of some of the good stuff from other micro frameworks as as well as some of the awesome libraries across the web. Want to get involved? I welcome you to participate on the <a href="http://www.litenframework.com/"><strong>main site</strong></a> as well as the <a href="https://github.com/7mediaws/Liten"><strong>Github</strong></a> repository.</p>

            	</p>
             </td>
	          <!-- end .eBody--> 
	        </tr>
	        
            <?php $app->view->stop(); ?>