# Show Server
Server and player for shows created with my show editor. Intended to be run on a Raspberry Pi.

## Installation & Setup
1. Install Apache or NGINX & PHP
2. Clone this repo (with submodule recursion) into your html folder.
3. In your PHP.ini, Set upload_max_filesize and post_max_filesize to something bigger than your biggest audio file (I set mine to ~50MB)
4. In order to let PHP play sound, you need to change the user Apache runs as:
   1. Open the Apache config with sudo nano /etc/apache2/envvars
   2. You should see the lines:
      - `export APACHE_RUN_USER=www-data`
      - `export APACHE_RUN_GROUP=www-data`
   3. Change them to (assuming 'pi' is still your default login):
      - `export APACHE_RUN_USER=pi`
      - `export APACHE_RUN_GROUP=pi`
   
   Or if using NGINX:
   1. In `/etc/nginx/nginx.conf` set `user` to `pi`
   2. In `/etc/php/7.0/fpm/pool.d/www.conf` set `user`, `group`, `listen.owner`, and `listen.group` all to `pi`.
5. Restart Apache/NGINX
6. Make sure the Pi is set to output audio to the jack, not HDMI
7. From another computer, navigate to your pi's IP address (something like 192.168.0.xx)
8. You should see the control panel that lets you control the show.

### Security Note
The server is NOT SECURE and should not be exposed to the internet. There is currently not proper input sanitization or login authentication. Make sure ports 80 and 22 are not being forwarded on your router.
