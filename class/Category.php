<?php
/**
 * modele categorie
 *
 * @author Florent
 */
class Category extends Element {
    private $id;
    private $name;
    private $slug;
    private $parent;
    
    public function __construct($id,$name, $slug, $parent)
    {
        $this->id = $id;
        $this->name = $name;
        $this->slug = $slug;
        $this->parent = $parent;
        
    }
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getSlug() {
        return $this->slug;
    }

    function getParent() {
        return $this->parent;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setSlug($slug) {
        $this->slug = $slug;
    }

    function setParent($parent) {
        $this->parent = $parent;
    }


}
