<?php

//use Firebase\JWT\JWT;

class Controller_Api extends Controller_Rest
{
    /*private $key = 'Shjkdfn324590dsfj23409udojf3p15623sdf';

    public function get_login()
    {

        $entry = Model_Users::find('all', array(
        'where' => array(
            array('username', $_GET['name']),
            array('password', $_GET['password']),
            ),
        ));

        $token = array(
            'id' => ,
            'username' => $username,
            'password' => $password
        )

        $jwt = JWT::encode($token, $key);  

        $json = $this->response(array(
            'code' => 200,
            'message' => 'Login',
        ));
        
        return $json; 
    }*/

    public function post_create()
    {
        try {
            if ( ! isset($_POST['name']) || $_POST['name'] == "" || ! isset($_POST['password']) || $_POST['password'] == "") 
            {
                $json = $this->response(array(
                    'code' => 400,
                    'message' => 'parametro incorrecto, se necesita que el parametro se llame name'
                ));

                return $json;
            }

            $input = $_POST;
            $user = new Model_Users();
            $user->username = $input['name'];
            $user->password = $input['password'];
            $user->save();

            $json = $this->response(array(
                'code' => 200,
                'message' => 'usuario creado',
                'data' => $input['name'],
                'pass' => $input['password']
            ));
            return $json;

        } 
        catch (Exception $e) 
        {
            $json = $this->response(array(
                'code' => 500,
                'message' => 'error interno del servidor',
            ));

            return $json;
        }

        
    }

    public function get_users()
    {
    	$users = Model_Users::find('all');

    	return $this->response(Arr::reindex($users));
    }

    public function post_delete()
    {
        $user = Model_Users::find($_POST['id']);
        $userName = $user->username;
        $user->delete();

        $json = $this->response(array(
            'code' => 200,
            'message' => 'usuario borrado',
            'data' => $userName
        ));

        return $json;
    }
}