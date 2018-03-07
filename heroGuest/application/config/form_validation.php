<?php
$config=array(

    array(
        'field'=>'username',
        'label'=>'User Name',
        'rules'=>'trim|required|min_length[3]|max_length[50]',
        'errors'=>array(
            'required'=>'Please Input',
            'min_length'=>'At least 3 character',
            'max_length'=>'50 character only',
        ),
    ),

    array(
        'field'=>'password',
        'label'=>'User Password',
        'rules'=>'trim|required|min_length[3]',
        'errors'=>array(
            'required'=>'Please Input',
            'min_length'=>'At least 3 character'
            ),
    ),

    array(
        'field'=>'roles',
        'label'=>'User Role',
        'rules'=>'trim|required',
        'errors'=>array(
            'required'=>'Please Input',
        ),
    ),

);