<?php
include "header.php";
include "conn.php";
include "functions.php";

?>

<!-- form search  -->

<form action="<?php echo $_SERVER['PHP_SELF']  ?>" method="POST">
    <h1>ΨΑΧΝΕ με ΟΝΟΜΑ η με ΑΡ.ΠΑΡ</h1>
    <input type="search" onkeyup="chen()" name="ser" id="inpSe">
    <input type="submit" id="click" onclick="doit(this)" value="click">
</form>


<!-- script to worck onkeyup whith clcik form submit that has class click -->
<script>
function chen() {

    document.getElementById("click").click();
};
<?php
if (isset($_GET['namp'])) {
    ?>
document.getElementById("inpSe").value = "<?php echo $_GET['namp']; ?>";
document.getElementById("click").click();

<?php
}

?>
</script>


<!-- i put server check down to can be worck the script in line 33 becuse i must we have element input to do this script -->

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
$word=$_POST['ser']."%";// i put this to search any name has first start latter
$cont1=checkVal("nameP", "pelatis", $word);// this is function in functions.php
?>
<script>
document.getElementById("inpSe").value = "<?php echo $_POST['ser'] ?>";
document.getElementById("inpSe").focus();
</script>

<?php
if($cont1 && !empty($_POST['ser'])){
$tmt=$db->prepare("SELECT * FROM pelatis WHERE nameP like ? AND piran =?");
$tmt->execute(array($word, 0));
$allPelatis=$tmt->fetchAll();
// echo "<pre>";
// print_r($allPelatis);
// echo "</pre>";
foreach($allPelatis as $pleatis){
    echo intval($pleatis['countS']). " ".$pleatis['nameP']. " ".$pleatis['par']. " ".$pleatis['where Is']. " ".$pleatis['mess']." ".$pleatis['type']."<br>";

?>
<div class="boxForm">
    <form action="updata.php" method="POST" class="box login" style="">
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
                <option>ΡΑΦΙ 1</option>
                <option>ΡΑΦΙ 2</option>
                <option>ΡΑΦΙ 3</option>
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
        <hr>
        <div class="newBoxButs">
            <div class="editbut bottomButs">
                <input type="submit" value="SAVE
                EDITE" style="width: 45%;">

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="48px" height="48px">
                    <path fill="#4caf50"
                        d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z">
                    </path>
                    <path fill="#ccff90"
                        d="M34.602,14.602L21,28.199l-5.602-5.598l-2.797,2.797L21,33.801l16.398-16.402L34.602,14.602z">
                    </path>
                </svg>
            </div>
            <a href="delete.php?do=delete&userid=<?php echo $pleatis['id'] ?>" class=" delBut bottomButs"
                style="width: 45%; border: none;">
                DELETE
                <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M6 7a1 1 0 0 1 1 1v11a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V8a1 1 0 1 1 2 0v11a3 3 0 0 1-3 3H8a3 3 0 0 1-3-3V8a1 1 0 0 1 1-1z"
                        fill="red">
                    </path>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M10 8a1 1 0 0 1 1 1v8a1 1 0 1 1-2 0V9a1 1 0 0 1 1-1zM14 8a1 1 0 0 1 1 1v8a1 1 0 1 1-2 0V9a1 1 0 0 1 1-1zM4 5a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2H5a1 1 0 0 1-1-1zM8 3a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1z"
                        fill="red">
                    </path>
                </svg>
            </a>
            <a href="piran.php?do=piran&userid=<?php echo $pleatis['id'] ?>" class="pirBut bottomButs" value="1"><span
                    class="spanButs">ΠΉΡΑΝΕ</span><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 460 460" width="48px"
                    height="48px" style="enable-background:new 0 0 460 460;" xml:space="preserve">
                    <g>
                        <path style="fill:#C2FBFF;"
                            d="M230,0C102.974,0,0,102.975,0,230s102.974,230,230,230c5.514,0,10.982-0.194,16.399-0.575l206.802-285.159C428.288,74.171,337.806,0,230,0z">
                        </path>
                        <path style="fill:#71E2F0;"
                            d="M246.398,459.412C365.769,451.001,460,351.511,460,230c0-19.219-2.372-37.882-6.813-55.726l-71.197-71.197L256.147,206.854L152.37,103.077l-80.193,6.193l35.415,35.416l-5.415,170.584L246.398,459.412z">
                        </path>
                        <path style="fill:#121149;"
                            d="M181.205,362.77l7.5,27.5c15.188,0,27.5-12.312,27.5-27.5s-12.312-27.5-27.5-27.5L181.205,362.77z">
                        </path>
                        <path style="fill:#273B7A;"
                            d="M161.205,362.77c0,15.188,12.312,27.5,27.5,27.5v-55C173.517,335.27,161.205,347.582,161.205,362.77z">
                        </path>
                        <path style="fill:#121149;"
                            d="M327.785,362.77l7.5,27.5c15.188,0,27.5-12.312,27.5-27.5s-12.312-27.5-27.5-27.5L327.785,362.77z">
                        </path>
                        <path style="fill:#273B7A;"
                            d="M307.785,362.77c0,15.188,12.312,27.5,27.5,27.5v-55C320.097,335.27,307.785,347.582,307.785,362.77z">
                        </path>
                        <polygon style="fill:#D48B07;"
                            points="381.99,103.077 381.99,305.27 266.685,305.27 282.076,113.077 302.083,103.076 	">
                        </polygon>
                        <polygon style="fill:#FFC61B;"
                            points="282.076,113.077 282.076,305.27 182.177,305.27 182.177,103.077 262.083,103.076 	">
                        </polygon>
                        <rect x="262.083" y="103.076" style="fill:#FFFFFF;" width="40" height="60"></rect>
                        <polygon style="fill:#121149;"
                            points="421.813,315.27 102.177,315.27 102.177,99.27 122.177,99.27 122.177,295.27 142.177,295.27 152.177,285.27 162.177,295.27 421.813,295.27 	">
                        </polygon>
                        <path style="fill:#273B7A;"
                            d="M162.177,295.27h-20v-166c0-11.028-8.972-20-20-20h-50v-20h50c22.056,0,40,17.944,40,40V295.27z">
                        </path>
                    </g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                    <g></g>
                </svg></a>
        </div>
        <hr>

    </form>
</div>


<?php



}
}
}
include "footer.php";


?>