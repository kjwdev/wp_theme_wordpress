<?php
if( !class_exists( 'theme_jbc' ) ) {
    function debug($arr)
    {
        echo '<pre>';
        var_dump($arr);
        echo '<pre>';
    }
    global $adminPanel_path;
    $adminPanel_path = get_template_directory() . '/admin-pannel/';
    class theme_jbc
    {
        /**
         * URI du thème
         */
        private $themeUri;

        /**
         * Va contenir un tableau de fichier CSS
         */
        private $css;
        private $js;
        private $class;

        public function __construct($lstCss, $lstJs, $lstClass)
        {
            $this->themeUri = get_template_directory_uri();
            $this->css = $lstCss;
            $this->js = $lstJs;
            $this->class = $lstClass;
            $this->loadClass();
            add_theme_support( 'post-thumbnails' ); 
            add_action('after_setup_theme', array(&$this, 'hooks' ) );
            
            require(get_template_directory() . '/admin-pannel/pannel.php');
        }

        public function loadClass()
        {
            foreach($this->class as $file){
                require( 'class/'.$file );
            }
        }
        
        public function add_sidebar()
        {
            // Sidebar
            register_sidebar( array(
        		'name' => __( 'Main Sidebar', 'kjw' ),
        		'id' => 'sidebar-1',
        		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
        		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        		'after_widget' => '</aside>',
        		'before_title' => '<h3 class="widget-title">',
        		'after_title' => '</h3>',
            ) );
            // Footer
            register_sidebar( array(
        		'name' => __( 'Footer 1', 'kjw' ),
        		'id' => 'footer-1',
        		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
        		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        		'after_widget' => '</aside>',
        		'before_title' => '<h3 class="widget-title">',
        		'after_title' => '</h3>',
            ) );
            register_sidebar( array(
        		'name' => __( 'Footer 2', 'kjw' ),
        		'id' => 'footer-2',
        		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
        		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        		'after_widget' => '</aside>',
        		'before_title' => '<h3 class="widget-title">',
        		'after_title' => '</h3>',
                    ) );
            register_sidebar( array(
        		'name' => __( 'Footer 3', 'kjw' ),
        		'id' => 'footer-3',
        		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
        		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        		'after_widget' => '</aside>',
        		'before_title' => '<h3 class="widget-title">',
        		'after_title' => '</h3>',
            ) );
            register_sidebar( array(
        		'name' => __( 'Footer 4', 'kjw' ),
        		'id' => 'footer-4',
        		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
        		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        		'after_widget' => '</aside>',
        		'before_title' => '<h3 class="widget-title">',
        		'after_title' => '</h3>',
            ) );
        }
        
        public function hooks()
        {
            add_action( 'wp_enqueue_scripts' , array(&$this, 'enqueueCss' ) );
            add_action( 'wp_enqueue_scripts' , array(&$this, 'enqueueJs' ) );
            add_action( 'init' , array(&$this, 'add_format_image' ) );
            add_action( 'widgets_init', array(&$this, 'add_sidebar' ) );
        }

        public function add_format_image()
        {
            add_image_size('size-full', 958, 195, true ); //(cropped)
            add_image_size('size-half', 414, 164, true );
            add_image_size('size-tier', 266, 97, true );
            add_image_size('size-details', 673, 136, true );
        }

        /**
         * Permet de charger les fichiers CSS contenu dans le tableau "$this->css"
         */
        public function enqueueCss()
        {
            foreach($this->css as $i=>$file){
                wp_register_style( 'css-'.$i, $this->themeUri.'/css/'.$file );
                wp_enqueue_style( 'css-'.$i );
            }
        }

        public function enqueueJs()
        {
            foreach($this->js as $i=>$file){
                wp_enqueue_script( 'js-jbc-'.$i, $this->themeUri.'/js/'.$file , array(), '1.0' , true );
            }
        }
        
        /**
         * GETTERS & SETTERS 
         *****************************/
        function getThemeUri()
        {
            return $this->themeUri;
        }
    }

    $css = array('normalize.css', 'standard.css', 'animate.css');
    $js = array('jquery-1.11.1.min.js', 'angular.min.js', 'angular-sanitize.js', 'angular-animate.min.js', 'itf_explorer.js');
    $class = array('geshi.php','Client.php','Element.php', 'Post.php','Category.php', 'Details.php');

    $theme = new theme_jbc($css, $js, $class);
}

?>