<?php

namespace App\Models;




use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast\Object_;

class Restriction extends Model
{
   
    
    private $erreurs = [];

    public function errorify($model){
     return $model;
    }
    public function controler($id, $cible){
    $model = 'App\Models\\'.ucfirst($cible['modelname']);
      $instance = new $model;
      $restriction = $instance->where($cible['foreignkey'],$id)->get();
      if($restriction->count() > 0){
         $erreur =$this->errorify($cible['modelname']);
         $this->erreurs[$cible['modelname']]=$erreur;
      }
    }
    public  function check ( int $id, array $cibles){
       foreach($cibles as $cible){
        
        try {
         $this->controler($id,$cible);
        } catch (\Throwable $th) {
         return ['restrictions'=> $this->erreurs,'message'=> 'Erreur:'.$th->getCode().'----La classe "Restriction" a rencontré une erreur dans les paramètre. Nom de model ou nom de clé étrangère incorrect'];
        }
       }
       if(!$this->erreurs){
          return false;
       }else{
        $msg='Impossible de supprimer cet enregistrement car il est lié aux entités : ';
        $messages=array_keys($this->erreurs);
        foreach($messages as $message){
            $msg = $msg.'\'\''.$message.'\'\'';
        }
           return ['restrictions'=> $this->erreurs,'message'=> $msg];
       }
    }
}