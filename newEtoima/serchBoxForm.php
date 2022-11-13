<div class="boxForm" id="form_<?php echo $pleatis['id'] ?>">
    <span><?php echo $pleatis['nameP'] ?> ΑΡ. ΠΑΡ : <?php echo intval($pleatis['par']) ?></span>
    <span style="disply:block" class="myDate"><?php echo ($pleatis['type']) ?></span>
    <span class="myDate">ΕΤΟΙΜΆΣΤΗΚΕ ΣΤΗΣ : <?php echo ($pleatis['date']) ?></span>
    <?php if(isset($_POST['chekPiran'])){
?>
    <span style="disply:block" class="myDate">ΤΟ ΠΉΡΑΝ ΣΤΗΣ :<?php echo ($pleatis['pirDate']) ?></span>
    <?php 
   }
?>

    <span class="spanButDown" style="display:block">
        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="48" height="48" fill="white" fill-opacity="0.01"></rect>
            <path d="M37 18L25 30L13 18" stroke="black" stroke-width="4" stroke-linecap="round" stroke-linejoin="round">
            </path>
        </svg>
    </span>

    <form action="updata.php" method="POST" class="box login searchBoxForm" style="">
        <div>
            <input type="hidden" name="IdNum" value="<?php echo $pleatis['id'] ?>" id="">
            <label class="labAcou"> ΑΡ. ΑΠΟΣΚΕΥΏΝ
                <input class="inpAcou" placeholder="countS" type="number"
                    value="<?php echo intval($pleatis['countS']) ?>" name="countSF">
            </label>
            <script>
            </script>
            <label class="labName">ΌΝΟΜΑ
                <input class="inpName" placeholder="nameP" type="text" name="namePF"
                    value="<?php echo $pleatis['nameP'] ?>">
            </label>
            <label class="labPar">ΑΡ. ΠΑΡ
                <input placeholder="par" type="number" name="parF" value="<?php echo intval($pleatis['par']) ?>">
            </label>
        </div>
        <hr>
        <div class="newBoxSel">ΠΟΥ ΕΊΝΑΙ;
            <select class="newSel" name="sele">
                <option selected name="hidSel"><?php echo $pleatis['where Is'] ?></option>
                <option>ΡΑΦΙ1</option>
                <option>ΡΑΦΙ2</option>
                <option>ΡΑΦΙ3</option>
                <option>ΠΑΤΟΜΑ</option>
                <option>ΆΛΛΟ</option>
            </select>
            <textarea class="newperigraf" placeholder="περιγραφη αν θελετε"
                name="mess"><?php echo $pleatis['mess'] ?></textarea>
        </div>
        <hr>
        <div>
            <label for="p" class="labPan">ΠΑΝΙ
                <input class="inpPan" type="checkbox" name="type[]" value="pani" id="p"
                    <?php if(str_contains($pleatis['type'], 'pani')){echo  "checked";}  ?>>
            </label>
            <label for="z" class="labPan">ΖΕΛΑΤΊΝΑ
                <input class="inpPar" type="checkbox" name="type[]" value="zelatina" id="z"
                    <?php if(str_contains($pleatis['type'], 'zelatina')){echo  "checked";}  ?>>
            </label>
            <label class="labPan" for="pz">ΜΟΥΣΑΜΆΣ
                <input class="inpPar" type="checkbox" name="type[]" value="mosma" id="pz"
                    <?php if(str_contains( $pleatis['type'], 'mosma')){echo  "checked";}  ?>>
            </label>
        </div>
        <script>
        var colMetals = ["khaki", "orange", "lightblue"];
        var metals = ["pani", "zelatina", "mosma"];
        var cols = [];
        </script>
        <hr>
        <div class="newBoxButs">
            <?php
if(!isset($_POST['chekPiran'])){

?>

            <button class="editbut bottomButs">
                <img src="./img/save.svg" alt="">

                <span style="width: 45%;">SAVE EDITE</span>
            </button>
            <?php
}
?>

            <a href="delete.php?do=delete&userid=<?php echo $pleatis['id'] ?>" class=" delBut bottomButs"
                style="width: 45%; border: none;">

                <img src="./img/del.svg" alt="">

                DELETE
            </a>
            <?php
if(!isset($_POST['chekPiran'])){

?>
            <a href="piran.php?do=piran&userid=<?php echo $pleatis['id'] ?>" class="pirBut bottomButs" value="1">
                <img src="./img/piran.svg" alt="">

                <span class="spanButs">ΠΉΡΑΝΕ</span>
                <?php
         }elseif(isset($_POST['chekPiran'])){
?>
                <a href="piran.php?do=epistrofi&userid=<?php echo $pleatis['id'] ?>" class="pirBut bottomButs"
                    value="1">
                    <img src="./img/epist.svg" alt="">

                    <span class="spanButs">ΕΠΙΣΤΡΟΦΉ</span>
                    <?php
         }       ?>
                </a>
        </div>
        <hr>

    </form>
</div>