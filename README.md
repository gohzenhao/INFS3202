Entry to application is through index.php in /public folder
index will require the bootstrap.php located in /app folder and will then create a new
Core object which handles all the url rerouting
Ensure RewriteBase in .htaccess located in /public contains the correct name of your directory

Ensure folder of the root of this project is same name as that in /app/config/config.php and in /public/.htaccess