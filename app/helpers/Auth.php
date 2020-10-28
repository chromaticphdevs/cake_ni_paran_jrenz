<?php

    class Auth
    {
        static $instance = null;

        public static function get($property)
        {

            if(self::$instance == null)
            {
                if(!Session::check('USER'))
                    return 0;
                self::$instance = Session::get('USER');
            }

            if(key_exists($property , self::$instance))
                return self::$instance[$property];
            return 0;
        }

        public static function allowed($userTypeList)
        {
            $user = Session::get('user');

            if( in_array($user->type, $userTypeList) )
                return true;
            return false;
        }
    }