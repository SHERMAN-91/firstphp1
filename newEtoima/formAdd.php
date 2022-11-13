<?php
include "header.php";
include "conn.php";
if($_SERVER['REQUEST_METHOD']=="POST"  ){

$counF=intval($_POST['countSF']);
$namepF=$_POST['namePF'];
$parF=intval($_POST['parF']);
$sel=$_POST['sele'];
$mess=$_POST['mess'];
 $allType="";

// $pan=$_POST['pani'];
// $zel=$_POST['type[]'];
if(isset($_POST['type'])){
foreach($_POST['type'] as $valuType){
    $allType.=$valuType ."  ";
}
}
if(empty($sel)){
    header("location:formAdd.php");
exit();
}
$stmt=$db->prepare("INSERT INTO pelatis(`countS`,`nameP`, `par`, `where Is`, `mess`, `type`,  `date`) VALUES (:zcoun, :znaP, :zpar, :zraf, :zmess, :ztype, now())");
$stmt->execute(array(
    'zcoun'=>$counF,
    'znaP'=> $namepF,
    'zpar'=> $parF,
    'zraf'=> $sel,
    'zmess'=>$mess,
    'ztype'=>$allType
));
}


?>


<div class="boxForm">
    <h1 class="title">ΝΕΩ ΕΤΟΙΜΑ </h1>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" METHOD="POST" class="box login" style="">
        <div>

            <label class="labAcou"> ΑΡ. ΑΠΟΣΚΕΥΏΝ
                <input class="inpAcou" onchange="goNext(this)" placeholder="countS" type="number" name="countSF">
            </label>
            <label class="labName">ΌΝΟΜΑ
                <input class="inpName" onchange="goNext(this)" placeholder="nameP" type="text" name="namePF">
            </label>
            <label class="labPar">ΑΡ. ΠΑΡ
                <input onchange="goNext(this)" class="inpPar" placeholder="par" type="number" name="parF">
            </label>
        </div>
        <hr>
        <div class="newBoxSel">ΠΟΥ ΕΊΝΑΙ;
            <select onchange="goNext(this)" class="newSel" name="sele">
                <option></option>
                <option>ΡΑΦΙ1</option>
                <option>ΡΑΦΙ2</option>
                <option>ΡΑΦΙ3</option>
                <option>ΠΑΤΟΜΑ</option>
                <option>ΆΛΛΟ</option>
            </select>
            <textarea class="newperigraf" placeholder="περιγραφη αν θελετε" name="mess"></textarea>
        </div>
        <hr>
        <div>
            <label for="p" class="labPan">ΠΑΝΙ
                <input class="inpPan" onclick="doItgreen(this)" type="checkbox" name="type[]" value="pani" id="p">
            </label>
            <label for="z" class="labPan">ΖΕΛΑΤΊΝΑ
                <input onclick="doItgreen(this)" class="inpPar" type="checkbox" name="type[]" value="zelatina" id="z">
            </label>
            <label class="labPan" for="pz">ΜΟΥΣΑΜΆΣ
                <input onclick="doItgreen(this)" class="inpPar" type="checkbox" name="type[]" value="mosma" id="pz">
            </label>
        </div>
        <hr>
        <div class="newBoxButs">
            <button class="editbut bottomButs">
                <img src="./img/save.svg" alt="">
                <span type="submit" id="saveInfo" value="SAVE" style="width: 45%;">SAVE</span>


            </button>
            <a href="index.php" ondblclick=" newSaveDel2(this)" class="delBut bottomButs"
                style="width: 45%; border: none;">
                <img src="./img/del.svg" alt="">

                DELETE

            </a>
        </div>
        <hr>

    </form>
</div>


<?php
include "footer.php";


?>