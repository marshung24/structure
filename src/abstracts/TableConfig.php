<?php
namespace marsapp\structure\abstracts;

use marsapp\structure\abstracts\Config;
use marsapp\helper\ArrayHelper;
/**
 * Table Config Profile
 *
 * @author Mars.Hung
 *        
 */
abstract class TableConfig extends Config
{

    /**
     * Config for table element
     *
     * Format :
     * - $_defaultConfig[$element][$attr] = $value;
     *
     * @var array
     */
    protected static $_defaultConfig = [
        'table' => [
            'style' => 'width:100%',
            'border' => '1'
        ],
        'thead' => [],
        'tbody' => [],
        'tfoot' => [],
        'tr' => [],
        'th' => [],
        'td' => []
    ];
    
    /**
     * Config for specify row
     *
     * Priority order: cell > col > row
     *
     * Format :
     * - $_rowConfig[$element][$row] = $value;
     *
     * @var array
     */
    protected static $_rowConfig = [
        'thead' => [],
        'tbody' => [],
        'tfoot' => []
    ];
    
    /**
     * Config for specify column
     *
     * Priority order: cell > col > row
     *
     * Format :
     * - $_colConfig[$element][$col] = $value;
     *
     * @var array
     */
    protected static $_colConfig = [
        'thead' => [],
        'tbody' => [],
        'tfoot' => []
    ];
    
    /**
     * Config for specify cell
     *
     * Priority order: cell > col > row
     *
     * Format :
     * - $_cellConfig[$element][$cell] = $value;
     *
     * @var array
     */
    protected static $_cellConfig = [
        'thead' => [],
        'tbody' => [],
        'tfoot' => []
    ];
    
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
     * Get Default Configs
     *
     * @param array|string $indexTo Content index of the data you want to get
     * @return array
     */
    public static function getDefultConfig($indexTo = [])
    {
        // Get Property content by index
        return ArrayHelper::getContent(self::$_defaultConfig, $indexTo);
    }
    
    /**
     * Get Row Configs
     *
     * @param array|string $indexTo Content index of the data you want to get
     * @return array
     */
    public static function getRowConfig($indexTo = [])
    {
        // Get Property content by index
        return ArrayHelper::getContent(self::$_rowConfig, $indexTo);
    }
    
    /**
     * Get Column Configs
     *
     * @param array|string $indexTo Content index of the data you want to get
     * @return array
     */
    public static function getColConfig($indexTo = [])
    {
        // Get Property content by index
        return ArrayHelper::getContent(self::$_colConfig, $indexTo);
    }
    
    /**
     * Get Cell Configs
     *
     * @param array|string $indexTo Content index of the data you want to get
     * @return array
     */
    public static function getCellConfig($indexTo = [])
    {
        // Get Property content by index
        return ArrayHelper::getContent(self::$_cellConfig, $indexTo);
    }
    
    /**
     * **********************************************
     * ************** private Function **************
     * **********************************************
     */
    
}