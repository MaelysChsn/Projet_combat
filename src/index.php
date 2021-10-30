<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <form class="c-joueurs active" method="post" action="index.php">
            <div class="c-joueur one active">
                <div class="form-group">
                  <label for="InputName">Choissisez le nom du joueur 1</label>
                  <input type="text" name="name1" class="form-control" id="InputName1" aria-describedby="nameHelp" placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label for="InputRoleMage">Mage</label>
                  <input type="radio" class="form-control" id="InputRoleMage" value="Mage" name="role1">
                  <label for="InputRoleMage">Guerrier</label>
                  <input type="radio" class="form-control" id="InputRoleGuerrier" value="Guerrier" name="role1">
                </div>
                <input type="button" name="suivant" value="suivant" id="suivant">
            </div>
              <div class="c-joueur two ">
                  <div class="form-group">
                    <label for="InputName">Choissisez le nom du joueur 2</label>
                    <input type="text" class="form-control" name="name2" id="InputName2" aria-describedby="nameHelp" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="InputRoleMage">Mage</label>
                    <input type="radio" class="form-control" id="InputRoleMage" value="Mage" name="role2">
                    <label for="InputRoleMage">Guerrier</label>
                    <input type="radio" class="form-control" id="InputRoleGuerrier" value="Guerrier" name="role2">
                  </div>
              </div>
              <button type="button" class="btn btn-primary " name="submit" id="submit">Commencer</button>
        </form>

        <div class="combat"></div>
        <span id="test"></span>

    </body>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript">
    $('#suivant').click(function(event){
        $('.c-joueur.one').removeClass('active');
        $('.c-joueur.two').addClass('active');
        $('.btn-primary').addClass('active');
    });

    $('#submit').click(function(event) {
        event.preventDefault();

        $('.c-joueurs').removeClass('active');
        $('.combat').addClass('active');

        var name_j1 = $('#InputName1').val();
        var role_j1 = $('input[type="radio"][name="role1"]:checked').val();
        var name_j2 = $('#InputName2').val();
        var role_j2 = $('input[type="radio"][name="role2"]:checked').val();

        $.ajax({
            type: 'POST',
            url: 'setFighter.php',
            data: {
                name1: name_j1,
                name2: name_j2,
                role1: role_j1,
                role2: role_j2
            },
            success: function(response) {
                $('.combat').html(response);
            }
        });
    });



    </script>
</html>
