<?php

namespace Models;


class Avis extends AbstractModel{

    private $author;
     public function getAuthor(){
        return $this->author;
    }

    public function setAuthor($author){
        $this->author = $author ;
    }
  
    private $content;
    public function getContent(){
        return $this->content;
    }

    public function setContent($content){
        $this->content = $content ;
    }


    private $id;
    public function getId() {
        return $this->id;
    }

    protected string $tableName = "avis";




    /** Retrouver les avis associé a un velo
     * 
     * @param int $velo_id
     * 
     * @return array|bool
     * 
     * 
     */
    public function findAllByVelo(int $velo_id){


        $sql = $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE velo_id = :velo_id");

        $velo = new \Models\Velo();

        $sql->execute([
            "velo_id" => $velo_id
        ]);

        $avis = $sql->fetchAll(\PDO::FETCH_CLASS, get_class($this));

        return $avis;
    }



    /** Enregistre un avis dasns la BDD 
     * 
     * @param Avis $avis
     */
    public function save(Avis $avis):void{


        $sql = $this->pdo->prepare("INSERT INTO {$this->tableName} (author, content, velo_id) VALUES 
        (:author, :content, :velo_id)");

        $velo = new \Models\Velo();

        $sql->execute([
            "author" => $avis->author,
            "content" => $avis->content,
            "velo_id" => $velo->getId()
        ]);


    }
}





?>