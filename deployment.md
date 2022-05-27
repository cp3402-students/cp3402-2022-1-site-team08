# Deployment
## Local Environment
### Site & LAMP server:
1. Install WordPress Packaged by Bitnami: https://bitnami.com/stack/wordpress/installer
2. During the installation process, make sure PhpMyAdmin is checked. You will be prompted to setup
an administrator account. Write down these credentials and store them securely.
3. If the windows defender firewall popup appears. Tick **Allow private network access to the Apache HTTP Server**
4. In the WordPress packaged by Bitnami Manager Tool, navigate to Manage Servers and ensure the Apache and MariaDB servers are running. 
5. Access website by typing the loopback address: 127.0.0.1 into a browser URL. On the page, click Access WordPress.
6. To access the WordPress Administrator Dashboard, change the URL from http://127.0.0.1/wordpress/ to http://127.0.0.1/wordpress/wp-admin.
7. Import Content using the All-in-One WP Migration plugin. 
8. Install Jazz Club Theme
9. Restart Apache and MariaDB servers and hard refresh browser using **Ctrl + F5** or **Ctrl + Shift + R**

### Theme Installation:
Before the site can be viewed, the theme must be imported into the WordPress site folder
1. Create a folder for the theme repository. This folder cannot be in Bitnami or the WordPress site. 
2. Using GitHub for Desktop or a programming IDE (PHPStorm, Visual Studio, etc), pull the latest changes to populate the folder.
3. Create a junction between the local theme repository folder and WordPress.
mklink /J "C:/Bitnami/.../wp-content/themes/underscores" "YourLocalThemeRepository/.../theme/underscores"
4. Now in WordPress, go to **Themes** and select the **Townsvile Jazz Club** Theme. 
In Appearance -> Menu, assign the Navigation Menu, Header Widgets Menu, and Footer.

## Content Management:
### Import Backups
***WARNING: Restoring a backup will overwrite the entire site including credentials.*** 
Next the site contents and configuration will need to be imported. Please contact the server administrator for the credentials before proceeding.
1. In WordPress, navigate to plugins and click installed plugins. 
2. Activate the All-in-One WP Migration plugin. 
3. A new icon will appear in the left menu. Click import.
4. Before the site contents can be imported, the Maximum upload file size (40MB) must be changed. Follow the 3rd method in [this tutorial](https://help.servmask.com/2018/10/27/how-to-increase-maximum-upload-file-size-in-wordpress/)

Here are the file locations:

.htaccess 
	
	Bitnami\wordpress-5.9.3-1\apps\wordpress\conf
	Bitnami\wordpress-5.9.3-1\apps\wordpress\htdocs\wp-content\ai1wm-backups
wp-config.php
	
	Bitnami\wordpress-5.9.3-1\apps\wordpress\htdocs

5. Append this line of code at the bottom of the file on a new line. These parameters control the file size limits. Unlike the tutorial, the values should be set higher to accomodate for potential increases in backup file size.

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

6. Restart the servers and refresh the site. It should now say:
	> "Maximum upload file size: 100 GB"
7. The latest content is available from the [CP3402-Team8](https://myjcuedu-my.sharepoint.com/personal/bonnie_gilsenan_my_jcu_edu_au/_layouts/15/onedrive.aspx?id=/personal/bonnie_gilsenan_my_jcu_edu_au/Documents/CP3402-Team8&ga=1.) OneDrive. The file is WP-Content-Backup.wpress. 
8. It is recommended to create a secure personal/business storage space for WordPress backups. For enterprises, a server should be implemented.
9. In WordPress, click **IMPORT FROM** and specify the location of the backup. 
10. Once completed, log-in with the credentials provided by group 08.

### Export Backups
1. Select Export in the All-in-One WP Migration menu.
2. Click Advanced Options.
3. Select Do not export themes (files).
4. Click **EXPORT TO** and specify location.

**NOTE: Depending on your use case, decide what contents should/shouldn't be exported.** 

### Modifying Content
There is currently no elegant way to have multiple users change content simultaneously. Use Trello to organize content changes through tasks. Clearly label backups, and communicate content changes using Slack. 

## Customizing Theme
Theme customization is made easier through the use of Sass. Underscores has a sass directory containing the partial SCSS files for elements of the site theme.
Sass creates a map file that links these partials to the main style.css.

To install Sass, get [Node.js](https://nodejs.org/en/).
Open Node.js Command Prompt with Administrator Priviledges and type: 
	
	npm i -g sass
After installation, the Sass File Watcher can be enabled in any terminal using the following commands.

	cd /Bitnami/.../wp-content/themes/underscores sass -w sass:.
If multiple users are working on the theme content simultaneously, it is recommended to work on different components or stagger development to avoid conficts. Conflicts will need to be stashed or resolved before merging.

## Publishing updates to GitHub
When theme changes have been made, commit them to the GitHub main branch. This branch is the most up to date experimental branch.

Additional branches can be created for experimental features or testing.

Use Pull Requests to make changes to the staging & production branch. The WordPress sites on the Staging and Production servers, have a WP-Pusher plugin which automatically detects chaanges to the respective branches in the repository.

Do not update the Production branch until all issues have been addressed.

## Server Setup (Staging and Production Environment)
The Staging and Production websites are host on Linux Virtual Machines in the Google Cloud Platform. These VM's can be accessed in the [Group Assignment-Team8-CP3402](https://console.cloud.google.com/compute/instances?project=group-assignment-team8-cp3402) project.

The Staging server is called **wordpress-2-vm**, and the Production server is **wordpress-1-vm-v2**.
The credentials including private keys, IP-addresses, WordPress logins should be obtained from a member of group 8. Store these somewhere secure.

### Creating VM instances
New VM instances can be created using the Machine Image template called **wordpress-updated**. This image comes with the content, theme, and plugins all pre-installed. New instances should only be created for testing purposes or migration.

If the Machine Images need to be scrapped, A new VM instance is created using the WordPress Certified by Bitnami and Automattic image from the Marketplace.

### Creating new Machine Image Template
If the current VM instances have significantly outdated content or theme. A new Machine Image can be created directly from the VM instance which is most up to date. This will speed up redeployment. Be sure to update credentials and VM documentation if necessary. 

### Content Management
Content uploads can be done the same way as in the local enviroment. However, the configuration files for setting the Max File Upload Size are in different locations on the VMs'.  Use SFTP or SSH to access the file system and edit the files.

.htaccess 
	
	/bitnami/wordpress/wp-content/ai1wm-backups

wp-config.php
	
	/opt/bitnami/wordpress

php.ini
	
	/opt/bitnami/php/etc

The settings should be set just like the local environment:

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

php.ini

	post_max_size = 102400M
	upload_max_filesize = 102400M

If permission denied occurs, temporarily change file permissions using the command: 
	
	chmod +x -R filename or foldername
If nothing changes, get root access or login as super user using:
	
	sudo su
Then use 

	sudo chmod +x -R filename or foldername

Be sure to revert file/folder permissions back to default permissions or 775.

### Assigning Static IP address:
For new VM-instances, the IP should be statically assigned. Go to VPC network -> IP addresses 
and reserve the External IP address.

# Project Management
## Communication
Communicate major updates through Slack. Slack is integrated with GitHub & Trello notifications for a high-level overview of the project.

Project meetings should be held in person, on Discord or Microsoft Teams.

Collaborative Sessions should be held in person or on Discord with screen sharing, video, and microphone.

## Organizating Tasks & Meetings
Trello is the main platform for Project Management. 
### Tasks
1. Tasks should be assigned to specific team members.
2. Keep task title succint.
3. Include an appropriate description that clearly indicates the objective of the task or the current situation.
4. Add labels that corrospond to the type of task.
5. Set Due Dates for tasks if applicable.
6. Create checklist if the task has a wide scope or many subsequent tasks.
7. Consult team member if assigning tasks on their behalf.
8. Ensure workload is evenly distributed between amongst the team.
### Meetings
1. Set Dates and Duration of meetings.
2. Specify who was present in the meeting and by what medium they were present.
3. Summarize tasks that were completed. If tasks were not completed, indicate why.
4. Briefly outline tasks that are in progress but close to completion.