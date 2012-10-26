uptime-mobile
================
Mobile dashboard which allows administrators to access the up.time UI from a mobile device.

Requirements
----------------
* JQuery [http://jquery.com]
* Smarty [PHP template engine] [http://www.smarty.net/]
* PHP libCURL [included with the up.time Monitoring Station]
* PHP libGD2 [included with the up.time Monitoring Station]

If running on the up.time Monitoring Station (which already includes Apache+PHP with the necessary modules), simply edit the up.time php.ini file (uptime_dir/apache/php/php.ini) and uncomment the following lines:
* extension=php_curl.dll
* extension=php_gd2.dll

Setup
=================
Installing on the up.time Monitoring Station
-----------------
* Install the up.time Controller (API) on the same system
* Download and extract this project (uptime-mobile) into a "/mobile" sub-directory in "[uptime_dir]/GUI/". The files should be placed in: "[uptime_dir]/GUI/mobile"
* Now that it's there, just enable remote access from outside of your network so that any mobile device can connect to that system, or else it will only be available from the internal network (Wifi).

That's it! The UI should now be available: Ex. http://uptime-server.company.com/mobile

Installing on any Web Server (in a DMZ)
-----------------
* Make sure the web server has PHP compatibility with the necessary libraries listed at the top
* Open up the "header.php" file in a text editor and modify the line below to point to the server where the up.time Controller (API) is installed:

<code>$uptime_api_hostname = "localhost";		// up.time Controller hostname (usually localhost, but not always)</code>

* Now that it's configured, just enable remote access from outside of your network so that any mobile device can connect to that system, or else it will only be available from the internal network (Wifi).

That's it! The UI should now be available: Ex. http://uptime-server.company.com/mobile
