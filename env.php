<?php

if ( ! function_exists( 'env' ) ) {
	
    /**
     * Gets the value of an environment variable. Supports boolean, empty and null.
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function env( $key, $default = null ) {
	    
        $value = getenv( $key );

        if ( $value === false ) {
            return value( $default );
        }

        switch ( strtolower( $value ) ) {
            case 'true' :
            case '(true)' :
                return true;

            case 'false' :
            case '(false)' :
                return false;

            case 'empty' :
            case '(empty)' :
                return '';

            case 'null' :
            case '(null)' :
                return;
        }

        if ( strlen( $value ) > 1 && str_starts_with( $value, '"' ) && str_starts_with( $value, '"' ) ) {
            return substr( $value, 1, -1 );
        }

        return $value;
        
    }
    
}

if ( ! function_exists( 'value' ) ) {
	
    /**
     * Return the default value of the given value.
     *
     * @param  mixed  $value
     * @return mixed
     */
    function value( $value ) {
	    
        return $value instanceof Closure ? $value() : $value;
        
    }
    
}

if( ! function_exists( 'str_starts_with' ) ) {
	
	/**
	 * Check if a string starts with a list of characters.
	 *
	 * @param string $haystack
	 * @param string|array $needles
	 * @return boolean
	 */
	function str_starts_with( $haystack, $needles ) {
		
        foreach( (array)$needles as $needle ) {
            if( $needle != '' && strpos( $haystack, $needle ) === 0 ) {
                return true;
            }
        }

        return false;
    
    }	
}

if( ! function_exists( 'str_ends_with' ) ) {
	
	/**
	 * Check if a string starts with a list of characters.
	 *
	 * @param string $haystack
	 * @param string|array $needles
	 * @return boolean
	 */
	function str_ends_with( $haystack, $needles ) {
		
        foreach ( (array) $needles as $needle ) {
            if ( (string)$needle === substr( $haystack, -strlen( $needle ) ) ) {
                return true;
            }
        }

        return false;
    
    }	
}