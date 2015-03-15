<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/smarty/libs/Smarty.class.php');

class CI_Smarty extends Smarty {

    var $CI;

    function __construct()
    {
        $this->CI =& get_instance();
        parent::__construct();
        $this->setTemplateDir(APPPATH . 'views/templates');
        $this->setCompileDir(APPPATH . 'views/cache');
        $this->setConfigDir(APPPATH . 'libraries/smarty/configs');
        $this->setCacheDir(APPPATH . 'libraries/smarty/cache');
        $vTempAbsPath = BASEPATH;
        $vAbsPath = str_replace("/system", "", $vTempAbsPath);
        $vAssestPath = $this->CI->config->base_url() . "assets/";
        $this->assign('ABSPATH', $vAbsPath);
        $this->assign('APPPATH', APPPATH);
        $this->assign('BASEPATH', BASEPATH);
        $this->assign('BASEURL', $this->CI->config->base_url());
        $this->assign('site_url', site_url('/'));
        $this->assign( 'ASSESTPATH', $vAssestPath);
        if (method_exists( $this, 'assignByRef')) {
            $ci =& get_instance();
            $this->assignByRef("ci", $ci);
        }
    }

    function fetchtpl($template_name)
    {
        if (strpos($template_name, '.') === FALSE && strpos($template_name, ':') === FALSE) {
            $template_name .= '.tpl';
        }
        return parent::fetch($template_name);
    }

    function view($template_name) {
        if (strpos($template_name, '.') === FALSE && strpos($template_name, ':') === FALSE) {
            $template_name .= '.tpl';
        }
        $this->display($template_name);
    }

    function display($template)
    {
        parent::display($template);
    }

    function layout($inner_template, $array)
    {
        foreach ($array as $key => $val) {
           $this->assign($key, $val);
        }
        $this->assign("inner_template", $inner_template);
        $this->display($this->theme . ".tpl");
        exit;
    }

    function add_css($style, $type = 'link', $media = FALSE)
    {
        $css = NULL;
        $aCssPaths = "";
        $this->CI->load->helper('url');
        foreach ($style as $style) {
            $filepath = get_css_Path() . $style;
            switch ($type) {
            case 'link':
                $css = '<link type="text/css" rel="stylesheet" href="' . $filepath . '"';
                if ($media) {
                   $css .= ' media="' . $media . '"';
                }
                $css .= ' />';
                break;

            case 'import':
                $css = '<style type="text/css">@import url(' . $filepath . ');</style>';
                break;

            case 'embed':
                $css = '<style type="text/css">';
                $css .= $style;
                $css .= '</style>';
                break;

            default:
                $success = FALSE;
                break;
            }
            $aCssPaths = $aCssPaths . "\n" . $css;
        }
        $this->assign("cssPath", $aCssPaths);
        //return $aCssPaths;
   }
   /**
    * Dynamically include javascript in the template
    *
    * NOTE: This function does NOT check for existence of .js file
    *
    * @access  public
    * @param   string   script to import or embed
    * @param   string  'import' to load external file or 'embed' to add as-is
    * @param   boolean  TRUE to use 'defer' attribute, FALSE to exclude it
    * @return  TRUE on success, FALSE otherwise
    */

   function add_js($script, $type = 'import', $defer = FALSE)
   {
      $success = TRUE;
      $js = NULL;

      $this->CI->load->helper('url');
      $aJsPaths = "";
      foreach ($script as $script) {
            switch ($type) {
            case 'import':
                $filepath = get_js_Path() . $script;
                $js = '<script type="text/javascript" src="' . $filepath . '"';
                if ($defer) {
                   $js .= ' defer="defer"';
                }
                $js .= "></script>";
                break;

            case 'embed':
                $js = '<script type="text/javascript"';
                if ($defer) {
                   $js .= ' defer="defer"';
                }
                $js .= ">";
                $js .= $script;
                $js .= '</script>';
                break;

            default:
                $success = FALSE;
                break;
            }
            $aJsPaths = $aJsPaths . "\n" . $js;

      }
      $this->assign("jsPath", $aJsPaths);

   }
}
?>