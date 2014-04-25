<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <?php Yii::app()->bootstrap->register(); ?>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/extensions/bootstrap/assets/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/extensions/bootstrap/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/extensions/bootstrap/assets/css/bootstrap-responsive.css" />

    <!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/extensions/bootstrap/themes/css/bootstrap.css" />-->

    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php //echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php //echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <!--<link rel="stylesheet" type="text/css" href="<?php //echo Yii::app()->request->baseUrl; ?>/css/form.css" />-->
    
    <link rel="stylesheet" type="text/css" href="../css/tbp-topmenu-styles.css">

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

</head>
<body>



<?php //if( Yii::app()->user->getIsGuest() ) {  
?>

<!-- page -->
<div class="container" id="page">
    <!-- header- don't really need this -->
    <!-- <div id="header">
        <div id="logo"><?php //echo CHtml::encode(Yii::app()->name); ?></div>
    </div> --><!-- header -->

    <!-- navbar -->
    <div class="navbar navbar-fixed-top navbar-inverse">
        <div class="container">
            <div class="navbar-inner">
                <div class="nav-collapse collapse">

                        <?php $this->widget('bootstrap.widgets.TbNavbar',array(
                            'type'=>'inverse', // null or 'inverse'
                            //'brand'=>'TBP Favorite App',
                            //'brandUrl'=>'#',
                            'collapse'=>true, // requires bootstrap-responsive.css
                            'items'=>array(
                                array(
                                    'class'=>'bootstrap.widgets.TbMenu',
                                    'items'=>array(
                                        //'htmlOptions'=>array('class'=>'pull-right'),
                                        array('label'=>'Home', 'url'=>'/', 'active'=>true),
                                        array('label'=>'About', 'url'=>'/index.php/about'),
                                        array('label'=>'Contact', 'url'=>'/index.php/contact'),
                                        /* this is supposed to be for a sign-in button in the navbar */
                                        //array('label'=>CHtml::image(Yii::app()->request->baseUrl.'./images/lighter.png', 'Sign in with Twitter', array('width' => '151', 'height' => '24')),'url'=>'/index.php/site/twitterredirect'),
                                        
                                        /* login through nav bar */
                                        array('label'=>'Login', 'url'=>array('/site/twitterredirect'), 'visible'=>Yii::app()->user->isGuest),
                                        
                                        /* display username in navbar after user has logged in */
                                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                                        
    /*                                    array('label'=>'Dropdown', 'url'=>'#', 'items'=>array(
                                            array('label'=>'Action', 'url'=>'#'),
                                            array('label'=>'Another action', 'url'=>'#'),
                                            array('label'=>'Something else here', 'url'=>'#'),
                                            '---',
                                            array('label'=>'NAV HEADER'),
                                            array('label'=>'Separated link', 'url'=>'#'),
                                            array('label'=>'One more separated link', 'url'=>'#'),
                                        )),*/
                                    ),
                                ),
                                //'<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Search"></form>',
    /*                            array(
                                    'class'=>'bootstrap.widgets.TbMenu',
                                    'htmlOptions'=>array('class'=>'pull-right'),
                                    'items'=>array(
                                        array('label'=>'Link', 'url'=>'#'),
                                        array('label'=>'Dropdown', 'url'=>'#', 'items'=>array(
                                            array('label'=>'Action', 'url'=>'#'),
                                            array('label'=>'Another action', 'url'=>'#'),
                                            array('label'=>'Something else here', 'url'=>'#'),
                                            '---',
                                            array('label'=>'Separated link', 'url'=>'#'),
                                        )),
                                    ),
                                ),*/
                            ),
                        )); 
                        ?>

                </div>
            </div>
        </div>
    </div> <!-- end navbar -->

</div><!-- end page -->

<!-- 
<link rel="stylesheet" type="text/css" href="../css/tbp-main-styles.css">

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container"> -->
        <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>-->
      
       <!--  <a class="navbar-brand text-muted" href="http://www.tbpautofavorite.dev/">TBP Auto Favorite Home</a>
        <div class="collapse navbar-collapse">
            <ul class="collapse navbar-collapse">
                <li><a href="#">Learn More</a></li>
                <li><a href="#">Log In</a></li> -->
                <!--<li class="nav-btn"><a href="#" class="nologin btn rr-btn-green btn-block">Sign Up</a></li>-->
<!--             </ul>
        </div>
    </div>
</div> -->

</body>
</html>
