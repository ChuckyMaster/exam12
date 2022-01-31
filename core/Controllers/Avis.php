<?php


namespace Controllers;

class Avis extends AbstractController{

    protected $defaultModelName = \Models\Avis::class;

    /**
 * 
 * Creer un nouvelle avis
 * @return void
 * 
 */
public function new(){
    if( !empty($_POST['veloId']) && ctype_digit($_POST['veloId'])) {
        $veloId = $_POST['veloId'];

    }


    if ( !empty($_POST['author'])) { 
        
        $author = htmlspecialchars($_POST['author']) ;
     }

     if (!empty($_POST['content'])) {
         $content = htmlspecialchars(($_POST['content']));
     }

     if(!$veloId || $content || $author) {

        return $this->redirect([
            'type' => 'velo',
            'action' => 'index'
        ]);
     }


     //verifier que le velo existe


     $modelVelo = new \Models\Velo();

     $velo = $modelVelo->findById($veloId);


     if (!$velo) {
        return $this->redirect([
            "action" => "index",
            "type" => "velo"
        ]);
     }


     $this->defaultModel->save($author, $content, $veloId);

     return $this->redirect([
        "action" => "show",
        "type" => "velo",
        "id" => $veloId
    ]);





    
}






}




?>