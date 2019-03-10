<?php
namespace marshung\structure\abstracts;

/**
 * Table Config Profile
 *
 * @author Mars.Hung
 *        
 */
abstract class Config
{
    
    /**
     * Config
     * @var array
     */
    protected static $_config = [];
    
    /**
     * Cache
     * @var array
     */
    protected static $_map = [];
    
    /**
     * Construct
     */
    public function __construct()
    {}

    /**
     * Destruct
     */
    public function __destruct()
    {}

    /**
     * *********************************************
     * ************** Public Function **************
     * *********************************************
     */
    
    /**
     * **********************************************
     * ************** private Function **************
     * **********************************************
     */
    
}