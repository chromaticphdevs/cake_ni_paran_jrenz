<?php 
    class Flash{

        const NAME = 'flash';
        
        public static function set($message = '' , $type ='success' , $key = self::NAME){
            //set flash keyname
            if(Session::check($key)){
                Session::remove($key);
            }
            //set flash classname
            if(Session::check($key.'_class')){
                Session::remove($key.'_class');
            }
    
            Session::set($key , $message);
            Session::set($key.'_class',$type);
            
        }

        public static function show($name = self::NAME){

            if(Session::check($name) && Session::check($name.'_class')){

                $className = Session::get($name.'_class');
                $message = Session::get($name);


                Session::remove($name); Session::remove($name.'_class');

                ?> 
                    <div class="ui message <?php echo $className?>">
                      <div class="header">
                        System Message
                      </div>
                      <p><?php echo $message?></p>
                    </div>
                    <div class="ui clearing divider"></div>
                <?php
            }

       
        }
    }