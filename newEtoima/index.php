<!-- main page  -->

<?php
include "header.php";
include "conn.php";
include "functions.php";


?>

<!-- form search -->
<form class="searchForm" action="<?php echo $_SERVER['PHP_SELF']  ?>" method="POST">
    <h1 class="title">ΨΑΧΝΕ με ΟΝΟΜΑ η με ΑΡ.ΠΑΡ</h1>
    <input type="search" onkeyup="chen()" placeholder=" ΟΝΟΜΑ η ΑΡ.ΠΑΡ" name="ser" id="inpSe">
    <input onclick="relod()" type="checkbox" name="chekPiran[]" id="inpcheckInp">
    <label id="labinpInp" for="inpcheckInp">
        <span id="spanInp">ΜΟΝΟ ΤΑ ΈΧΟΥΝ ΠΆΡΕΙ</span>
        <div id="pareBoxInp">
            <div id="boxInp">
                <div id="cirInp"></div>
            </div>
        </div>
    </label>
    <input type="submit" id="click" onclick="doit(this)" value="click">

</form>
<div class='serDiv'>
    <div class="">
        <ul class='seleLis'>
            <div class="spanButDown" style="display:block">ΨΑΧΝΕ ΑΠΟ ΕΔΩ
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="48" height="48" fill="white" fill-opacity="0.01"></rect>
                    <path d="M37 18L25 30L13 18" stroke="black" stroke-width="4" stroke-linecap="round"
                        stroke-linejoin="round">
                    </path>
                </svg>
            </div>
            <li class="liList"><a
                    href="?do=typeSer&type=pani&piran=<?php if(isset($_POST['chekPiran'])) {echo "1";}else{if(isset($_GET['piran'])){echo $_GET['piran'];}else{echo "0";}}?>">pani</a>
            </li>
            <li class="liList"><a
                    href="?do=typeSer&type=zelatina&piran=<?php if(isset($_POST['chekPiran'])) {echo "1";}else{if(isset($_GET['piran'])){echo $_GET['piran'];}else{echo "0";}}?>">zelatina</a>
            </li>
            <li class="liList"><a
                    href="?do=typeSer&type=mosma&piran=<?php if(isset($_POST['chekPiran'])) {echo "1";}else{if(isset($_GET['piran'])){echo $_GET['piran'];}else{echo "0";}}?>">mosma</a>
            </li>
            <li class="liList"><a
                    href="?do=typeSer&type=olla&piran=<?php if(isset($_POST['chekPiran'])) {echo "1";}else{if(isset($_GET['piran'])){echo $_GET['piran'];}else{echo "0";}}?>">olla</a>
            </li>
        </ul>
    </div>

    <div class="">
        <ul class='seleLis'>
            <div class="spanButDown" style="display:block">ΨΑΧΝΕ ΑΠΟ ΕΔΩ
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="48" height="48" fill="white" fill-opacity="0.01"></rect>
                    <path d="M37 18L25 30L13 18" stroke="black" stroke-width="4" stroke-linecap="round"
                        stroke-linejoin="round">
                    </path>
                </svg>
            </div>
            <li class="liWhere"><a
                    href="?do=whereIs&where=ΡΑΦΙ1&piran=<?php if(isset($_POST['chekPiran'])) {echo "1";}else{if(isset($_GET['piran'])){echo $_GET['piran'];}else{echo "0";}}?>">ΡΑΦΙ1</a>
            </li>
            <li class="liWhere"><a
                    href="?do=whereIs&where=ΡΑΦΙ2&piran=<?php if(isset($_POST['chekPiran'])) {echo "1";}else{if(isset($_GET['piran'])){echo $_GET['piran'];}else{echo "0";}}?>">ΡΑΦΙ2</a>
            </li>
            <li class="liWhere"><a
                    href="?do=whereIs&where=ΡΑΦΙ3&piran=<?php if(isset($_POST['chekPiran'])) {echo "1";}else{if(isset($_GET['piran'])){echo $_GET['piran'];}else{echo "0";}}?>">ΡΑΦΙ3</a>
            </li>
            <li class="liWhere"><a
                    href="?do=whereIs&where=ΠΑΤΟΜΑ&piran=<?php if(isset($_POST['chekPiran'])) {echo "1";}else{if(isset($_GET['piran'])){echo $_GET['piran'];}else{echo "0";}}?>">ΠΑΤΟΜΑ</a>
            </li>
            <li class="liWhere"><a
                    href="?do=whereIs&where=ΆΛΛΟ&piran=<?php if(isset($_POST['chekPiran'])) {echo "1";}else{if(isset($_GET['piran'])){echo $_GET['piran'];}else{echo "0";}}?>">ΆΛΛΟ</a>
            </li>

        </ul>
    </div>
</div>
<!-- end form search -->


<!-- script to worck onkeyup whith clcik form submit that has class click -->
<script>
function relod() {
    document.getElementById("click").click();
    document.getElementById("inpcheckInp").checked =
        <?php if(isset($_POST['chekPiran'])) {echo "false";}else{echo "true";}?>; //هنا يتم تحويل الى وضع جديد
}

// هنا يتحقق من القيمة POST  و على اساسها يتم التحديد او لا
document.getElementById("inpcheckInp").checked =
    <?php if(isset($_POST['chekPiran'])) {echo "true";}else{echo "false";}?>; // this line to stay button checked or unchecked

function chen() {

    document.getElementById("click").click();
};
<?php
if (isset($_POST['namp'])) {

    ?>
document.getElementById("inpSe").value = "<?php echo $_POST['namp']; ?>";
// document.getElementById("click").click();

<?php
}

?>
</script>


<!-- i put server check down to can be worck the script in line 33 becuse i must we have element input to do this script -->

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    
$word=$_POST['ser']."%";// i put this to search any name has first start latter
$chekpir=0;
$cont1=checkVal("nameP", "pelatis", $word);// this is function in functions.php
$cont2=checkVal("par", "pelatis", $word);// this is function in functions.php
if(isset($_POST['chekPiran'])){
$chekpir=1;
}

?>
<script>
document.getElementById("inpSe").value = "<?php echo $_POST['ser'] ?>";
document.getElementById("inpSe").focus();
</script>

<?php
if(($cont1 || $cont2) && !empty($_POST['ser'])){
    // SELECT * FROM pelatis WHERE nameP like 's%' OR par LIKE '3%' AND  piran=0
$tmt=$db->prepare("SELECT * FROM pelatis WHERE nameP like :zname OR par like :zpar AND  piran= :zpiran");

$tmt->execute(array(
    'zname'=>$word,
    'zpar'=>$word,
     'zpiran'=>$chekpir)

);
$allPelatis=$tmt->fetchAll();



foreach($allPelatis as $pleatis){


?>
<?php include "serchBoxForm.php" ?>
<?php



}
}
elseif($cont1==0){
    ?>
<div class="alert">ΔΕΝ ΕΧΕΙ </div>
<?php
}
}
elseif(isset($_GET['do']) && $_GET['do']=='typeSer'){
    ?>

<script>
<?php
$chekpir=0;
if($_GET['piran']=='1'){
?>
document.getElementById("inpcheckInp").checked = true;
<?php
$_POST['chekPiran']='1';
$chekpir=1;

}elseif($_GET['piran']=='0' ){
    ?>
document.getElementById("inpcheckInp").checked = false;
<?php

}
    ?>
</script>
<?php
$tmt="";
   if($_GET['type']!='olla'){
$word="%".$_GET['type']."%";
$tmt=$db->prepare("SELECT * FROM pelatis WHERE `type` like ?  and piran=?");

$tmt->execute(array($word, $chekpir));
   }
elseif($_GET['type']=='olla'){
$tmt=$db->prepare("SELECT * FROM pelatis WHERE piran=?");

$tmt->execute(array($chekpir));
}
$allPelatis=$tmt->fetchAll();

foreach($allPelatis as $pleatis){


?>
<?php include "serchBoxForm.php" ?>
<?php
}
}
elseif(isset($_GET['do']) && $_GET['do']=='whereIs'){

?>

<script>
<?php
$chekpir=0;
if($_GET['piran']=='1'){
?>
document.getElementById("inpcheckInp").checked = true;
<?php
$_POST['chekPiran']='1';
$chekpir=1;

}elseif($_GET['piran']=='0' ){
    ?>
document.getElementById("inpcheckInp").checked = false;
<?php

}
    ?>
</script>
<?php
$tmt="";
//    if($_GET['where']!='olla'){
$word="%".$_GET['where']."%";
$tmt=$db->prepare("SELECT * FROM pelatis WHERE `where Is` like ?  and piran=?");

$tmt->execute(array($word, $chekpir));
//    }
// elseif($_GET['type']=='olla'){
// $tmt=$db->prepare("SELECT * FROM pelatis WHERE piran=?");

// $tmt->execute(array($chekpir));
// }
$allPelatis=$tmt->fetchAll();

foreach($allPelatis as $pleatis){


?>
<?php include "serchBoxForm.php" ?>
<?php
}
}
?>
<a class="openTable" href="formAdd.php"><button class="add">click</button></a>
<?php
include "footer.php";
?>