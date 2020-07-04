<?php
class Model {

    public function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key);          
            $method = ucwords("$method", "_");          
            $method = str_replace("_", "", $method);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}