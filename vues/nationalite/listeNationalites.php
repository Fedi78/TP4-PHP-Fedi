<div class="row pt-5">
        <div class="col-9"> <h2> Liste des Nationalités </h2>    </div>
        <div class="col-3"><a href="formNationalite.php?action=Ajouter" class='btn btn-success'><img src="../Images/plus-circle.svg" width="20" ><i class="fas fa-plus-circle"></i> Créer une nationalité</a> </div>

    </div>

 


  <form action="index.php?uc=nationalite&action=list" method="post" class="border border-primary rounded p-3">

  <div class="row">

    <!-- FORM -->
      <div class="col">

        <input type="text" class="form-control" id="libelle" placeholder="Saisir le libellé" name="libelle"  value= "<?php $libelle; ?>">
         
      </div>
 
      <div class="col">
      <select name="continent" class="form-control">
            <?php      
            
            echo " 
                <option value='tous'> Tous les continents</option>
                
                ";
            
            foreach($lesContinents as $continent){
                
                $selection = $continent->getNum() == $continentSel ? 'selected' : '';
                echo " 
                <option value='".$continent->getNum()."'". $selection.">". $continent->getLibelle()."</option>
                
                ";
            
            }
            ?>

            </select>
      </div>
      <!-- BUTTON -->
      <div class="col">
            
        <button type="submit" class="btn btn-success btn-block">Rechercher</button>

      </div>

  </div>

  </form>

</div>

<!-- Tableaux -->
<div class="container mt-5">

<table class="table table-hover table-dark">
    <thead>
      <tr>
        <td class="col-md-2"><strong>Numéro</strong></td>
        <td class="col-md-4"><strong>Libellé</strong></td>
        <td class="col-md-3"><strong>Continent</strong></td>
        <td class="col-md-2"><strong>Actions</strong></td>
      </tr>
    </thead>

<?php

// Afficher la requête nationalite

foreach($lesNationalites as $nationalite)

  {

  echo "<tr>";
  echo "<td>$nationalite->numero</td>";
  echo "<td>$nationalite->libNation</td>";
  echo "<td>$nationalite->libContinent</td>";
  echo"
 
  <td>
    <a href='formNationalite.php?action=Modifier&num=$nationalite->numero'class='btn btn-success'><img src='../images/modifier.svg'>
    
    </a>
    
    <a href='#modalSupp' data-toggle='modal'data-message='êtes-vous sûr de vouloir supprimer cette nationalité ?' data-supp='supprimerNationalite.php?num=$nationalite->numero' class='btn btn-danger'><img src='../Images/supp.svg'><i class='fas fa-plus-circle'></i></a>
      
      
    </a>
    
    </td>
    </tr>
    
    ";
    
  }

  ?>
  </table>
</div>
<br>
<div class="dialecte">

      
  <br>
  <br>
</div>