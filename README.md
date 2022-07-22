# School CI
To Setup this project in local, Please change in index.php file which is available at root.

Just change the environment variable to development, like below mentioned.
define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');
and don't upload this file on the git.

After this process go to the db folder & read the file read_me.txt for database setup.
