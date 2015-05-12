<?php
/**
 * modele Details
 *
 * @author Florent
 */
class Details extends Element{
    private $id;
    private $title;
    private $dt;
    private $img;
    private $content;
    
    public function __construct($id, $title, $dt, $content)
    {
        $this->id= $id;
        $this->title = $title;
        $this->dt = $dt;
        $this->img = get_the_post_thumbnail($this->id, 'size-details');
        $this->content = $this->parseContent($content);
    }
    
    public function parseContent($content)
    {
        $pContent = array();
        // traitement de la variable $content
        //
        //$pContent = str_replace("\r", "<br />", $content);
        $xplContent = explode("\r", $content);
        $cpt = 0;
        $modeCode = false;
        $strCode = '';
        foreach($xplContent as $part)
        {
            if(preg_match('/<code/', $part) || $modeCode==true){
                $modeCode = true;
                $strCode .=$part;
                if(preg_match('/<\/code>/', $part)){
                    $strCode = str_replace('<code>','',$strCode);
                    $strCode = str_replace('</code>','',$strCode);
                    $geshi =& new GeSHi($strCode, "php"); // Créer un objet « GeSHi »
                    $pContent[$cpt]['part'] = $geshi->parse_code();
                    $pContent[$cpt]['type'] = 'code';
                    $cpt++;
                    $modeCode = false;
                }
            }else{
                $strCode = '';
                if($part!="\n"){
                    $pContent[$cpt]['part']= str_replace("\n", "", $part);
                    if(preg_match('/<img/', $pContent[$cpt]['part'])){
                        $pContent[$cpt]['type'] = 'img';
                    }elseif(preg_match('/<iframe/', $pContent[$cpt]['part'])){
                        $pContent[$cpt]['type'] = 'video';
                    }else{
                        $pContent[$cpt]['type'] = 'text';
                    }
                    $cpt++;
                }
            }
        }
        return $pContent;
    }
    
    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getContent() {
        return $this->content;
    }
    function getImg() {
        return $this->img;
    }

    function setImg($img) {
        $this->img = $img;
    }
    function getDt() {
        return $this->dt;
    }

    function setDt($dt) {
        $this->dt = $dt;
    }

        function setId($id) {
        $this->id = $id;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setContent($content) {
        $this->content = $content;
    }


}
