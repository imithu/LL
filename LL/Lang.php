<?php 

namespace LL;



class Lang{

    /**
     * @var string $Path - Set the language location files
     * 
     * @version 1.0.0
     * @since 1.0.0
     * @author Mahmudul Hasan Mithu
     */
    public static $Path = '';


    /**
     * 
     * set the language
     * 
     * @param string $name - (optional)
     * 
     * 
     * @version 1.0.0
     * @since 1.0.0
     * @author Mahmudul Hasan Mithu
     */
    public static function lang_set( $name='' )
    {
        if( $name=='' ){
            $name = self::lang_default_get();
            setcookie( 'LL_Lang', $name, (time()+(3600*24*30*13*100)), '/' );
        }else{
            setcookie( 'LL_Lang', $name, (time()+(3600*24*30*13*100)), '/' );
        }
    }


    /**
     * 
     * get the language
     * 
     * 
     * @return string - language name
     * 
     * @version 1.0.0
     * @since 1.0.0
     * @author Mahmudul Hasan Mithu
     */
    public static function lang_get()
    {
        if( isset($_COOKIE['LL_Lang']) ){
            $lang = htmlspecialchars($_COOKIE['LL_Lang']);
        }else{
            self::lang_set();
            $lang = 'en';
        }
        return $lang;
    }


    /**
     * 
     * set the default
     * 
     * @param string $name - (optional)
     * 
     * 
     * @version 1.0.0
     * @since 1.0.0
     * @author Mahmudul Hasan Mithu
     */
    public static function lang_default_set( $name='' )
    {
        if( $name=='' ){
            $name = 'en';
            setcookie( 'LL_Lang_Default', $name, (time()+(3600*24*30*13*100)), '/' );
        }else{
            setcookie( 'LL_Lang_Default', $name, (time()+(3600*24*30*13*100)), '/' );
        }
    }


    /**
     * 
     * get the default language
     * 
     * 
     * @return string - language name
     * 
     * @version 1.0.0
     * @since 1.0.0
     * @author Mahmudul Hasan Mithu
     */
    public static function lang_default_get()
    {
        if( isset($_COOKIE['LL_Lang_Default']) ){
            $lang = htmlspecialchars($_COOKIE['LL_Lang_Default']);
        }else{
            self::lang_default_set();
            $lang = 'en';
        }
        return $lang;
    }


    /**
     * 
     * get the translated word
     * 
     * @param string $file
     * @param string $word
     * 
     * @return string - translated word
     *                - if not found then return (string), 'Error: Word is not available in this language.'
     * 
     * 
     * @version 1.0.0
     * @since 1.0.0
     * @author Mahmudul Hasan Mithu
     */
    public static function __( $file, $word )
    {
        $lang = self::lang_get();

        $lang_file = file_get_contents( self::$Path.$file.'.json' ) ;

        $lang_file = json_decode( $lang_file, true );

        return $lang_file[ $lang ][ $word ] ?? $lang_file[ self::lang_default_get() ][ $word ] ?? 'ERROR: Language Translate Process Failed' ;
    }
}