<?php
namespace Controllers;



class Velo extends AbstractController{

    //on indique sur quelle model de classe on interagi en utilisant la variable $defautModelName
    //de le classe AbstractController

    protected $defaultModelName = \Models\Velo::class;




    /**
     * 
     * Affiche des velos
     * 
     * @return Response
     */
    public function index(){

        $velos = $this->defaultModel->findAll();

        //la methode render se charge d'afficher et attend deux parametre: nom du dossier dans templates, 
        //et un tableau avec le titre de la page avec des index et valeur pour chaque variable


        return $this->render("velos/index",
         ["pageTitle" => "Tous les Vélos!",
          "velos" => $velos ]);




    }


    /**
     * 
     * Affichage d'une page de velo
     * 
     * @return void
     */
    public function show(){



        $id = null;
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
       
            $id = $_GET['id'];
        }



        if(!$id){
            return $this->redirect([
                'action' => 'index',
                'type' => 'velo'
            ]);
        }

        $velo = $this->defaultModel->findById($id);


        if(!$velo) {
            return $this->redirect([
                'action' => 'index',
                'type' => 'velo'
            ]);
        }
        $modelAvis = new \Models\Avis();

        $avis = $modelAvis->findAllByVelo($velo->getId());
       
            return $this->render("velos/show", ['pageTitle' => $velo->getName(),
            'velo' => $velo,'avis' => $avis] );
                
        
 }



                /**
                 * 
                 * creation d'un velo
                 * 
                 * @return void
                 */
                public function new(){
                 $name = null;
                $image = null;
                $description = null;
                $price = null;

                    

                    if(!empty($_POST['name'])){ $name = htmlspecialchars($_POST['name']);}
                    if(!empty($_POST['image'])){ $image = htmlspecialchars($_POST['image']);}
                    if(!empty($_POST['description'])){ $description = htmlspecialchars($_POST['description']);}
                    if(!empty($_POST['price']) && ctype_digit($_POST['price'])) { $price = $_POST['price'];}




                    if($name && $image && $description && $price){

                        $velo = new \Models\Velo();
                        $velo->setName($name);
                        $velo->setImage($image);
                        $velo->setDescription($description);
                        $velo->setPrice($price);

                        $this->defaultModel->save($velo);

                        return $this->redirect([
                             'type' => 'velo',
                             'action' => 'index'
                        ] );
                           
                       
                    
                    }

                    return $this->render("velos/create", ["pageTitle" => "Nouveau Velo"]);

                }



    /**
     * 
     * Supprimer un velo de la BDD et rediriger vers la page des velos
     * 
     * @return Response
     * 
     */
    public function delete():Response{
        $id=null;
        if( !empty($_POST['id']) && ctype_digit($_POST['id'])){  $id = $_POST['id']; }

        if(!$id){return $this->redirect([
            'type' => 'velo',
            'action' => 'noId'
        ]);}

        $this->defaultModel->remove($id);

        return $this->redirect([
            'type' => 'velo',
            'action' => 'index'
        ]);


    }

              




}










?>