<?php
/**
 * Modéle post
 */
class Post extends Element{
    private $id;
    private $title;
    private $excerpt;
    private $link;
    private $cat = array();
    private $css;
    private $dtCreate;
    private $dtModified;
    private $img = array();
    protected $_R; //retour quand il y en a besoin
    

    public function __construct($id, $title, $exc, $link, $cats = array())
    {
        $this->id = $id;
        $this->title = $title;
        $this->excerpt = $exc;
        $this->link = $link;
        $this->dtCreate = get_the_date();
        $this->dtModified = get_the_modified_date();
        $this->img['size-100'] = get_the_post_thumbnail($this->id, 'size-full');
        $this->img['size-50'] = get_the_post_thumbnail($this->id, 'size-half');
        $this->img['size-33'] = get_the_post_thumbnail($this->id, 'size-tier');
        if(class_exists('Category'))
        {
            if( is_array($cats) && count($cats)>0 ){
                $idC = 0;
                foreach($cats as &$cat)
                {
                    $category = new Category($cat->term_id, $cat->name, $cat->slug, $cat->parent);
                    $this->cat[$idC] = $category->convertToArray(array('id', 'name', 'slug', 'parent'));
                    $idC++;
                }unset($cat);
                if(count($this->cat)>0){
                    $this->css  =$this->cat[0]['slug'];
                }
            }
            
        }
    }
    
    /*
     * GETTER & SETTER
     ******************************/
    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getExcerpt() {
        return $this->excerpt;
    }

    function getLink() {
        return $this->link;
    }
    function getCat() {
        return $this->cat;
    }
    function getCss() {
        return $this->css;
    }
    function getImg() {
        return $this->img;
    }
    function getDtCreate() {
        return $this->dtCreate;
    }
    function getDtModified() {
        return $this->dtModified;
    }

    

        
    
    function setCss($css) {
        $this->css = $css;
    }  
    function setId($id) {
        $this->id = $id;
    }
    function setTitle($title) {
        $this->title = $title;
    }
    function setExcerpt($excerpt) {
        $this->excerpt = $excerpt;
    }
    function setLink($link) {
        $this->link = $link;
    }
    function setCat($cat) {
        $this->cat = $cat;
    }
    function setImg($img) {
        $this->img = $img;
    }
    function setDtCreate($dtCreate) {
        $this->dtCreate = $dtCreate;
    }
    function setDtModified($dtModified) {
        $this->dtModified = $dtModified;
    }


}

