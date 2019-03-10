<?php
namespace marshung\structure\types;

use \marshung\structure\abstracts\TableConfig;
use \marshung\structure\abstracts\TableStyle;

/**
 * Table Structure Builder
 *
 * After the structure is described using the array data, the constructor is used to generate the code.
 *
 * @author Mars.Hung
 */
class TableBuilder
{

    /**
     * Table Config Profile
     * 
     * @var TableConfig
     */
    protected static $_config = null;

    /**
     * Table Style Profile
     * @var TableStyle
     */
    protected static $_style = null;

    /**
     * Record cell status
     *
     * @var array
     */
    protected static $_coordinate = [
        'now' => [],
        'info' => []
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
     * Table Code Render
     *
     * @param array $options            
     * @return string
     */
    public static function render($options)
    {
        /* Arguments prepare */
        // When $_config, $_style is not set, need to give them default values.
        $config = isset($options['config']) ? $options['config'] : (empty(self::$_config) ? new \marshung\structure\configs\TableDefaultConfig() : '');
        $style = isset($options['style']) ? $options['style'] : (empty(self::$_style) ? new \marshung\structure\styles\TableDefaultStyle() : '');
        $head = isset($options['head']) ? $options['head'] : [];
        $data = isset($options['data']) ? $options['data'] : [];
        $foot = isset($options['foot']) ? $options['foot'] : [];
        
        // Reset coordinate
        self::resetCoordinate();
        
        // Set the object of the configuration definition
        ! empty($config) && self::setConfig($config);
        // Set the object of the style definition
        ! empty($style) && self::setStyle($style);
        
        $code = '';
        
        // Thead Code make up
        ! empty($head) && $code .= self::TheadMakeup($head);
        
        // Tbody Code make up
        $code .= self::TbodyMakeup($data);
        
        // Tfoot Code make up
        ! empty($foot) && $code .= self::TfootMakeup($foot);
        
        // Table Code make up
        $code = self::TableRender($code);
        
        return $code;
    }

    /**
     * Set the object of the configuration definition
     *
     * @param TableConfig $config            
     */
    public static function setConfig(TableConfig $config)
    {
        self::$_config = $config;
    }

    /**
     * Set the object of the style definition
     *
     * @param TableStyle $style            
     */
    public static function setStyle(TableStyle $style)
    {
        self::$_style = $style;
    }

    /**
     * Reset coordinate - alias to resetCoordinate()
     *
     * @return new static()
     */
    public static function resetXY()
    {
        return self::resetCoordinate();
    }

    /**
     * Reset coordinate
     *
     * @return new static()
     */
    public static function resetCoordinate()
    {
        self::$_coordinate = [
            'now' => [],
            'info' => []
        ];
        
        return new static();
    }

    /**
     * Get coordinate
     */
    public static function getXY()
    {}

    /**
     * ********************************************************
     * ************** Public for option Function **************
     * ********************************************************
     */
    
    /**
     * Set option
     *
     * @param array $option            
     * @param string $tag            
     */
    public static function setOption(Array $option, $tag = '')
    {
//         if (empty($tag)) {
//             // Set all option - filter & merge
//             $option = array_intersect_key($option, self::$_defaultConfig);
//             self::$_defaultConfig = $option + self::$_defaultConfig;
//         } elseif (isset(self::$_defaultConfig[$tag])) {
//             // Set specify option
//             self::$_defaultConfig[$tag] = $option;
//         } else {
//             // Error
//             throw new \Exception('Error: target(' + $tag + ') not allow !', 400);
//         }
    }

    /**
     * Get option
     *
     * @param string $tag            
     */
    public static function getOption(String $tag = '')
    {
//         if (empty($tag)) {
//             // Get all option
//             return self::$_defaultConfig;
//         } elseif (isset(self::$_defaultConfig[$tag])) {
//             // Get specify option
//             return self::$_defaultConfig[$tag];
//         } else {
//             // Error
//             throw new \Exception('Error: target(' + $tag + ') not allow !', 400);
//         }
    }

    /**
     * *********************************************************
     * ************** Private for Render Function **************
     * *********************************************************
     */
    
    /**
     * Table code render
     *
     * @param String $content
     *            content code
     * @return string
     */
    protected static function TableRender(String $content)
    {
        return self::TagCodeRender('table', $content);
    }

    /**
     * Thead code render
     *
     * @param String $content
     *            content code
     * @return string
     */
    protected static function TheadRender(String $content)
    {
        return self::TagCodeRender('thead', $content);
    }

    /**
     * Tbody code render
     *
     * @param String $content
     *            content code
     * @return string
     */
    protected static function TbodyRender(String $content)
    {
        return self::TagCodeRender('tbody', $content);
    }

    /**
     * Tfoot code render
     *
     * @param String $content
     *            content code
     * @return string
     */
    protected static function TfootRender(String $content)
    {
        return self::TagCodeRender('tfoot', $content);
    }

    /**
     * Tr code render
     *
     * @param String $content
     *            content code
     * @return string
     */
    protected static function TrRender(String $content)
    {
        return self::TagCodeRender('tr', $content);
    }

    /**
     * Th code render
     *
     * @param String $content
     *            content code
     * @return string
     */
    protected static function ThRender(String $content)
    {
        ($content === '' || is_null($content)) && $content = '&nbsp;';
        return self::TagCodeRender('th', $content);
    }

    /**
     * Td code render
     *
     * @param String $content
     *            content code
     * @return string
     */
    protected static function TdRender(String $content)
    {
        ($content === '') && $content = '&nbsp;';
        return self::TagCodeRender('td', $content);
    }

    /**
     * Tag code render
     *
     * @param String $tag            
     * @param String $content            
     * @return string
     */
    protected static function TagCodeRender(String $tag, String $content)
    {
        // 建構標籤
        $code = '<' . $tag;
        
        if (isset(self::$_defaultConfig[$tag]))
            foreach (self::$_defaultConfig[$tag] as $name => $value) {
                if (is_array($value)) {
                    $code .= ' ' . $name . '="' . implode(' ', $value) . '" ';
                } else {
                    $code .= ' ' . $name . '="' . $value . '"';
                }
            }
        $code .= '>';
        
        // 寫入內容
        $code .= $content;
        
        // 建構標籤
        $code .= '</' . $tag . '>';
        
        return $code;
    }

    /**
     * **********************************************************
     * ************** Private for make up Function **************
     * **********************************************************
     */
    
    /**
     * Thead Code make up
     *
     * @param array $data            
     * @return string
     */
    protected static function TheadMakeup(Array $data)
    {
        return self::makeup($data, 'ThRender', 'TheadRender');
    }

    /**
     * Tbody Code make up
     *
     * @param array $data            
     * @return string
     */
    protected static function TbodyMakeup(Array $data)
    {
        return self::makeup($data, 'TdRender', 'TbodyRender');
    }

    /**
     * Tfoot Code make up
     *
     * @param array $data            
     * @return string
     */
    protected static function TfootMakeup(Array $data)
    {
        return self::makeup($data, 'TdRender', 'TfootRender');
    }

    /**
     * Code make up
     *
     * @param array $data            
     * @param String $cellRender
     *            TdRender, ThRender
     * @param String $parentRender
     *            TheadRender, TbodyRender, TfootRender
     * @return mixed
     */
    protected static function makeup(Array $data, String $cellRender, String $parentRender)
    {
        $code = '';
        foreach ($data as $rk => $row) {
            $tdCode = '';
            foreach ($row as $ck => $col) {
                $tdCode .= call_user_func([
                    self,
                    $cellRender
                ], $col);
            }
            $code .= self::TrRender($tdCode);
        }
        
        $code = call_user_func([
            self,
            $parentRender
        ], $code);
        
        return $code;
    }
}