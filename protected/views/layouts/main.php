<!--<link rel="icon" type="image/x-icon" href=".../images/favicon.ico"> <link rel="shortcut icon" type="image/x-icon" href=".../images//favicon.ico">-->

<?php $this->renderPartial('//layouts/topmenu'); ?>
<?php //echo $this->getHeader(); ?>
 
        <?php
             // echos Yii content
             //echo $content;
        ?>
 
<?php //echo $this->getFooter(); ?>

<div class="container">     
	<div>
		<h1><?php echo $this->pageTitle=Yii::app()->name; ?></h1>
		<p>A marketing tool that automatically favorites tweets matching search tags for users of the app</p>
	</div>
	<div>
		<!-- "sign in with twitter" button -->
		<!-- <p><a href="http://www.tbpautofavorite.dev/index.php/site/twitterredirect"><img src="../images/lighter.png" alt="Sign in with Twitter"/></a></p> -->
		<!-- "sign up for twitter" button -->
		<p><a href="http://www.tbpautofavorite.dev/index.php/site/twitterredirect"><img src="../images/sign_up_with_twitter.png" alt="Sign up with Twitter"/></a></p>
	</div>
</div>


<div class="clear"></div>
<div id="footer">
	Copyright &copy; <?php echo date('Y'); ?> by <?php echo Yii::app()->params['companyName']?>. <br/>
	All Rights Reserved.<br/>
	<?php echo Yii::powered(); ?>
</div><!-- footer -->