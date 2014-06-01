TBP Auto Favorite Twitter Aapp
=============================

A web app to run continuously and automatically favorite tweets matching searchtags set by users of the app 

Yii Web Programming Framework
=============================

Thank you for choosing Yii - a high-performance component-based PHP framework.
The Yii Developer Team
http://www.yiiframework.com

INSTALLATION
------------

Please make sure the release file is unpacked under a Web-accessible
directory. You shall see the following files and directories:

      demos/               demos
      framework/           framework source files
      requirements/        requirement checker
      CHANGELOG            describing changes in every Yii release
      LICENSE              license of Yii
      README               this file
      UPGRADE              upgrading instructions

REQUIREMENTS
------------

The minimum requirement by Yii is that your Web server supports
PHP 5.1.0 or above. Yii has been tested with Apache HTTP server
on Windows and Linux operating systems.

Please access the following URL to check if your Web server reaches
the requirements by Yii, assuming "YiiPath" is where Yii is installed:

      http://hostname/YiiPath/requirements/index.php

QUICK START
-----------

Yii comes with a command line tool called "yiic" that can create
a skeleton Yii application for you to start with.

On command line, type in the following commands:

        $ cd YiiPath/framework                (Linux)
        cd YiiPath\framework                  (Windows)

        $ ./yiic webapp ../testdrive          (Linux)
        yiic webapp ..\testdrive              (Windows)

The new Yii application will be created at "YiiPath/testdrive".
You can access it with the following URL:

        http://hostname/YiiPath/testdrive/index.php

WHAT's NEXT
-----------

With the token credentials build a new TwitterOAuth object:

    $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $token_credentials['oauth_token'],
    $token_credentials['oauth_token_secret']);

Make requests authenticated as the user, by using GET, POST, and DELETE API
methods. Directly copy the path from the API documentation and add an array of any parameter
to include for the API method such as curser or in_reply_to_status_id.

    $account = $connection->get('account/verify_credentials');
    $status = $connection->post('statuses/update', array('status' => 'Text of status here', 'in_reply_to_status_id' => 123456));
    $status = $connection->delete('statuses/destroy/12345');

Contributors
============

John DiBaggio - Developer

