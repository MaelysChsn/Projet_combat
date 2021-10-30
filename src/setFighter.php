<?php
session_start();
include("personnage.php");
include("Mage.php");
include("Guerrier.php");
//Connection db mysqli
try{
    $bdd = new PDO('mysql:host=db;dbname=docker', 'root', 'example');
}catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

$name1 = $_POST['name1'];
$role1 = $_POST['role1'];
$name2 = $_POST['name2'];
$role2 = $_POST['role2'];

$query = $bdd->prepare('DELETE FROM `Fighter`');
$drop = $query->execute();


//Formulaire data joueur1

if($role1 === 'Mage'){
    $joueur1 = new Mage($name1);

}else{
    $joueur1 = new Guerrier($name1);
}

if($role2 === 'Mage'){
    $joueur2 = new Mage($name2);
}else{
    $joueur2 = new Guerrier($name2);
}

$_SESSION['joueur1'] = $joueur1;
$_SESSION['joueur2'] = $joueur2;

echo $_SESSION['joueur1'];

$joueurs  = array (
  array($name1, $role1, 'joueur1'),
  array($name2, $role2, 'joueur2')
);

for ($i=0; $i < count($joueurs); $i++) {
  if($joueurs[$i][2] === 'joueur1'){
    $sql = $bdd->prepare("INSERT INTO `Fighter`(nom, vie, attaque, defense, role, joueur)
    VALUES ('$joueur1->nom', $joueur1->vie, $joueur1->attaque ,$joueur1->defense, '$role1', 'joueur1')");
  }else{
    $sql = $bdd->prepare("INSERT INTO `Fighter`(nom, vie, attaque, defense, role, joueur)
    VALUES ('$joueur2->nom', $joueur2->vie, $joueur2->attaque ,$joueur2->defense, '$role2', 'joueur2')");
  }
  $result = $sql->execute();
}



$query = 'SELECT * FROM `Fighter`';

foreach  ($bdd->query($query) as $row) {
  ?>
  <div class="c-fight">
    <div class="c-joueur_infos">
      <?php
        print $row['nom'] . "\t";
        print  $row['vie'] . "\t";
        print  $row['attaque'] . "\t";
        print  $row['defense'] . "\t";
        print $row['role'] . "\n";
        print $row['joueur'] . "\n";

      ?>
    </div>
    <?php
      if($row['joueur'] === "joueur1"){
        $target_data = "joueur2";
      }else{
        $target_data = "joueur1";
      }

    ?>
    <form method="post" action="index.php">
      <input type="button" class="attaque" id="btn_attaque" value="Attaquer" data-target="<?php echo $target_data?>" data-joueur="<?php echo $row['joueur']?>"/>
      <input type="button" class="attaque" id="btn_endormir" value="Endormir" data-target="<?php echo $target_data?>" data-joueur="<?php echo $row['joueur']?>"/>
    </form>
  </div>
  <br/>
  <br/>
<?php

}
?>

<script type="text/javascript">
  $('.attaque').click(function(event) {
        event.preventDefault();
        var target = $(this).attr('data-target');
        var joueur = $(this).attr('data-joueur');

        $.ajax({
            type: 'POST',
            url: 'Fight.php',
            data: {
                target: target,
                joueur: joueur
            },
            success: function(response) {
                $('#test').html(response);
            }
        });
    });
</script>
