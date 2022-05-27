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

WARNING: Restoring a backup will overwrite the entire site including credentials. 
Please contact the server administrator for the credentials before proceeding.

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

Append this line of code at the bottom of the file on a new line. These parameters control the file size limits.
Unlike the tutorial, the values should be set higher to accomodate for potential increases in backup file size.

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

Restart the servers and refresh the site. It should now say "Maximum upload file size: 100 GB".
The latest content is available from this OneDrive: https://myjcuedu-my.sharepoint.com/personal/bonnie_gilsenan_my_jcu_edu_au/_layouts/15/onedrive.aspx?id=%2Fpersonal%2Fbonnie%5Fgilsenan%5Fmy%5Fjcu%5Fedu%5Fau%2FDocuments%2FCP3402%2DTeam8&ga=1.
The file is WP-Content-Backup.wpress. 

It is recommended to create a secure personal/business storage space for WordPress backups. For enterprises, a server should be implemented.
In WordPress, click IMPORT FROM and specify the location of the backup. Once completed, log-in with the credentials provided by group 08.

THEME:
Before the site can be viewed, the theme must be imported into the wordpress folder.
Create a folder for the theme repository. This folder cannot be in Bitnami or the WordPress site. Using GitHub for Desktop or a programming IDE (PHPStorm, Visual Studio, etc), pull the latest changes to populate the folder.

Create a junction between the local theme repository folder and WordPress.
mklink /J "C:/Bitnami/.../wp-content/themes/underscores" "YourLocalThemeRepository/.../theme/underscores"
  


