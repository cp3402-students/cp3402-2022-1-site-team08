# Deployment
### Local Environment
Install WordPress Packaged by Bitnami: https://bitnami.com/stack/wordpress/installer
During the installation process, make sure PhpMyAdmin is checked. You will be prompted to setup
an administrator account. Write down these credentials and store them securely.

If the windows defender firewall popup appears. Allow private network access to the Apache HTTP Server

In the WordPress packaged by Bitnami Manager Tool, navigate to Manage Servers and ensure the Apache and MariaDB servers are running. 
The wordpress site can be accessed by typing the loopback address: 127.0.0.1 into a browser URL. On the page, click Access WordPress.

To access the WordPress Administrator Dashboard, change the URL from http://127.0.0.1/wordpress/ to http://127.0.0.1/wordpress/wp-admin.

Next the site contents and configuration will need to be imported.
In WordPress, navigate to plugins and click installed plugins. Activate the All-in-One WP Migration plugin. 
A new icon will appear in the left menu. Click import.
Before the site contents can be imported, the Maximum upload file size (40MB) must be changed.
Follow the 3rd method in this tutorial: https://help.servmask.com/2018/10/27/how-to-increase-maximum-upload-file-size-in-wordpress/

Here are the file locations:

	.htaccess 
	Bitnami\wordpress-5.9.3-1\apps\wordpress\conf
	Bitnami\wordpress-5.9.3-1\apps\wordpress\htdocs\wp-content\ai1wm-backups


	wp-config.php
	Bitnami\wordpress-5.9.3-1\apps\wordpress\htdocs

Append this line of code at the bottom of the file on a new line.

.htaccess 
php_value upload_max_filesize 102400M
php_value post_max_size 102400M
php_value memory_limit 204800M
php_value max_execution_time 300
php_value max_input_time 300

wp-config.php
@ini_set( 'upload_max_filesize' , '102400M' );
@ini_set( 'post_max_size', '102400M');
@ini_set( 'memory_limit', '204800M' );
@ini_set( 'max_execution_time', '300' );
@ini_set( 'max_input_time', '300' );

