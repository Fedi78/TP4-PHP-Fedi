<div class="container mt-5  ">
    <h2 class='pt-4 text-center'><?php echo $mode ?> une Nationalité</h2>

            <form action="index.php?uc=nationalites&action=validForm"=<?php echo $mode ?>" method="post" class="col-md-6 offset-md-3 border border-primary p-3 rounded">
             <div class="form-group">
                <label for='libelle' > Libellé </label>
                        <input type="text" class='form-control' id="libelle" placeholder='Saisir le libellé' name='libelle' value="<?php if($mode == "Modifier") {echo $laNationalite->libelle ;}?>">
                </div>
                <div class="form-group">
                        <label for='continent' > Libellé </label>
                      <select name="continent" class="form-control">
                        <?php
                        foreach ($lesContinents as $continent)
                        {
                            $selection=$continent->getNum() == $laNationalite->getNumContinent() ? 'selected' :'';
                            $selection=$continent->getNum() == $laNationalite->getNumContinent()->getNum() ? 'selected' :'';
                            echo "<option value='" . $continent->getNum() . "' ". $selection." >". $continent->getLibelle() ."</option>";
                        }                    
                        ?>
                      </select>
        <input type="hidden" id="num" name="num" value="<?php if($mode == "Modifier") {echo $laNationalite->getNum();} ?>">
        <div class="row">
            <div class="col"><a href="index.php?uc=nationalite&action=list" class='btn btn-primary btn-block'>Revenir a La Liste</a> </div>
            <div class="col"><button type='submit' class='btn btn-success btn-block'> <?php echo $mode ?> </button> </div>
        </div>
</form>
</div>