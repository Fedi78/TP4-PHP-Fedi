<?php
$action=$_GET['action'];
switch($action){
   
    case 'list' :
        // traitement du formulaire recherche
        $libelle="";
        $continentSel="Tous";
        if(!empty($_POST['libelle'])  ||  !empty($_POST['continent'])){
                $libelle= $_POST['libelle'];
                $continentSel= $_POST['continent'];
        }
        $lesContinents=Continent::findAll();
        $lesNationalites=Nationalite::findAll($libelle, $continentSel);
            include ('vues/nationalite/listeNationalite.php');
    break;
    case 'add' :
            $mode="Ajouter";
            include('vues/nationalite/formNationalite.php');
    break;
    case 'update' :
            $mode="Modifier";
            $nationalite = Nationalite::findById($_GET['num']);
            include('vues/nationalite/formNationalite.php');
    break;
    case 'delete' :
            $Nationalite=Nationalite::findById($_GET['num']);
            $nb=Nationalite::Delete($Nationalite);
    if($nb==1){
                $_SESSION['message']=["success"=>"Le nationalite a bien été supprimé"];
            }else{
                $_SESSION['message']=["danger"=>"Le nationalite n'a pas été $message"];
            }
            header('location: index.php?uc=nationalites&action=list');
            exit();
    break;
    case 'valideForm' :
             $nationalite = new Nationalite;
        if(empty($_POST['num']))
        { //cas d'une crétion
            $nationalite->setLibelle($_POST['libelle']);
            $nb=Nationalite::add($nationalite);
            $message = "ajouté";

    }else{
            $nationalite->setNum($_POST['num']); //cas d'une modif
            $nationalite->setLibelle($_POST['libelle']);
            $nb=Nationalite::update($nationalite);
            $message = "modifié";
    }
    if($nb==1){
        $_SESSION['message']=["success"=>"Le nationalite a bien été $message"];
    }else{
        $_SESSION['message']=["danger"=>"Le nationalite a bien été $message"];
    }
        header('location: index.php?uc=nationalites&action=list');
    exit();
    break;
   
 }
