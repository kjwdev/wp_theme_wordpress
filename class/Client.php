<?php
/**
 * Classe principal qui centralise les différents élements du site
 * Retoune les informations affichés en Front sous forme de tableau formaté.
 * Le but est de pouvoir convertir le tableau en json pour le traité avec angularJs
 *
 * @author Kjw
 */
class Client {
    private $lstCat; // liste des catégorie du wordpress
    private $lstPost;
    private $details;
    /**
     * Par defaut, je renvoie la liste des caterories
     */
    public function __construct()
    {
        $cats = get_categories();
        if(class_exists('Category'))
        {
            if( is_array($cats) && count($cats)>0 ){
                $idC = 0;
                foreach($cats as &$cat)
                {
                    $category = new Category($cat->term_id, $cat->name, $cat->slug, $cat->parent);
                    $this->lstCat[$idC] = $category->convertToArray(array('id', 'name', 'slug', 'parent'));
                    $this->lstCat[$idC]['aff']=true;
                    $idC++;
                }unset($cat);
            }
        }
    }

    public function loadDefaultPosts()
    {
        if ( have_posts() ) :
            $j=$i=0;
            /*
             * va contenir une liste d'objet ticket.
             */
            $lstPosts = array();
            while ( have_posts() ) : the_post(); 
                $type=array();
                $i = get_the_ID();
                $cats = get_the_category();

                $this_post = new Post($i, get_the_title(), get_the_excerpt(), get_the_permalink(), $cats);
                $this->lstPost[$j] = $this_post->convertToArray(array('id', 'title', 'dtCreate', 'dtModified', 'excerpt', 'link','cat', 'css', 'img'));
                $this->lstPost[$j]['aff'] = true; 

                $j++;
            endwhile;
        endif;
    }
    
    public function loadDetailsPost()
    {
        if (have_posts()) :
            while (have_posts()) : the_post();
                $this_details = new Details(get_the_ID(), get_the_title(), get_the_date(), get_the_content());
                $this->details = $this_details->convertToArray(array('id', 'title', 'dt', 'img', 'content'));
            endwhile;
        endif;
    }
    
    public function getLstCat()
    {
        return $this->lstCat;
    }
    
    public function getLstPost()
    {
        return $this->lstPost;
    }
    
    public function getDetails()
    {
        return $this->details;
    }
}
