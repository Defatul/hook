<?php

if(! class_exists('DEF_Hook') ){
    class DEF_Hook {

        /*!
         * @var array
         */
        var $hooks = [];

        /*!
         * Fonksiyon tanımlar.
         * @exp: set_action( 'function-name' );
         */
        function set_action($tag){
            $this->hooks [$tag] = [];
        }

        /*!
         * Fonksiyonlar tanımlar.
         * @exp: set_action( array( 'function-1', 'function-2' ) );
         */
        function set_actions($tags){
            foreach( $tags as $tag ){
                $this->set_action( $tag );
            }
        }

        function unset_action($tag){
            unset( $this->hooks [$tag] );
        }

        function add_action($tag, $function, $priority = 10){
            if( isset( $this->hooks [$tag] ) ){
                $this->hooks [$tag] [$priority] = $function;
            }else print ( 'Kanca Bağlantısı Yapılacak Fonksiyon Bulunamadı..' );
        }

        function do_action($tag, $args = NULL){
            if( isset( $this->hooks [$tag] ) ){
                foreach( $this->hooks [$tag] as $priority => $function ){
                    $args = call_user_func( $function, $args );
                }
                return $args;
            }else print ( 'Fonksiyon Bulunamadı..' );
        }

    }
}else exit( '[DEF_Hook] CLASS OFF.' );