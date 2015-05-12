<?php
/**
 * Classe mère de tous éléments de wordpress
 *
 * @author Florent
 */
class Element {
    /**
     * retourne un modele de données en tableau
     * $valReturn est un tableau des élément que l'on veut voir apparaitre dans le tableau
     */
    public function convertToArray($valReturn)
    {
        foreach($valReturn as $elem){
            $method = 'get'.ucfirst($elem);
            $this->_R[$elem] = $this->$method();
        }
        return $this->_R;
    }
    
    
}
