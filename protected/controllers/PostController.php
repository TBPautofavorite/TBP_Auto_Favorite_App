<?php

class PostController extends Controller
{
	

}

public function accessRules()
/* customize access control
{
    return array(
        array('allow',  // allow all users to perform 'list' and 'show' actions
            'actions'=>array('index', 'view'),
            'users'=>array('*'),
        ),
        array('allow', // allow authenticated users to perform any action
            'users'=>array('@'),
        ),
        array('deny',  // deny all users
            'users'=>array('*'),
        ),
    );
}

 ?>