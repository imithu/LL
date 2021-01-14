<?php 

namespace LL;


use Illuminate\Support\Facades\Storage;



class Lang{

    /**
     * @var array $config
     * 
     * 
     * @version 2.0.0
     * @since 2.0.0
     * @author Mahmudul Hasan Mithu
     */
    private static $config = NULL;

    /**
     * @var string $lang_default
     * 
     * @version 2.0.0
     * @since 2.0.0
     * @author Mahmudul Hasan Mithu
     */
    private static $lang_default = NULL ;

    /**
     * @var string $Path - Set the language location files
     * 
     * @version 1.0.0
     * @since 1.0.0
     * @author Mahmudul Hasan Mithu
     */
    public static $Path = '';



    
    /**
     * set the language in cookie for 100 years (approx.)
     * --------------------------------------------------
     * totally independent method
     * 
     * 
     * @param string $lang - lang name
     * 
     * 
     * @version 2.0.0
     * @since 1.0.0
     * @author Mahmudul Hasan Mithu
     */
    public static function lang_set( $lang )
    {
        setcookie( 'LL_Lang', $lang, (time()+(3600*24*30*13*100)), '/' );
    }




    /**
     * determine config and lang_default
     * ----------------------------------
     * totally independent method
     * 
     * @version 2.0.0
     * @since   2.0.0
     * @author  Mahmudul Hasan Mithu
     */
    private static function config()
    {
        $config = Storage::disk('local')->path('LL/Self/config.json');
        $config = json_decode(file_get_contents($config), true);

        self::$config = $config;
        self::$lang_default = $config['lang_default'];
    }




    /**
     * 
     * get the language
     * ---------------------------
     * depends on config()
     * 
     * 
     * @return string - language name
     * 
     * @version 2.0.0
     * @since 1.0.0
     * @author Mahmudul Hasan Mithu
     */
    public static function lang_get()
    {
        self::config();
        
        if( isset($_COOKIE['LL_Lang']) ){
            return htmlspecialchars($_COOKIE['LL_Lang']);
        }
        
        self::lang_set( self::$lang_default );
        return self::$lang_default;
    }




    /**
     * check if a lang is rtl or not
     * ----------------------------------
     * depends on lang_get(), config()
     * config() is called in lang_get()
     * 
     * 
     * @return bool true  - if the lang_get is     rtl
     *              false - if the lang_get is not rtl
     * 
     * @version 2.0.0
     * @since 2.0.0
     * @author Mahmudul Hasan Mithu
     */
    public static function rtl()
    {
        $lang = self::lang_get();
        $rtl_langs = self::$config['rtl'];  // get all the rtl langs

        foreach( $rtl_langs as $rtl_lang ){
            if( $rtl_lang==$lang ){
                return true;
                break;
            }
        }

        return false;
    }



    
    /**
     * 
     * get the translated word
     * -------------------------
     * depends on lang_get()
     * 
     * @param string $word
     * 
     * @return string - translated word
     *                - if not found then return (string), 'ERROR: Language Translate Process Failed'
     * 
     * 
     * @version 2.0.0
     * @since 1.0.0
     * @author Mahmudul Hasan Mithu
     */
    public static function __( $word )
    {
        $lang = self::lang_get();
        $lang_file = self::$Path;

        $lang_file = json_decode( file_get_contents( $lang_file ), true );

        return $lang_file[ $lang ][ $word ] ?? 'ERROR: Language Translate Process Failed' ;
    }
}