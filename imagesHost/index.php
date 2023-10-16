<?php
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

        $error = 1;

        if($_FILES['image']['size'] <= 3000000){
           $informationImage = pathinfo($_FILES['image']['name']);
           $extensionImage = $informationImage['extension'];
           $extensionArray  = array('jpg', 'png', 'jpeg', 'gif');

           if(in_array($extensionImage, $extensionArray)){

                $adress = 'uploads/'.time().rand().rand().'.'.$extensionImage;
                move_uploaded_file($_FILES ['image'] ['tmp_name'], $adress );
                $error = 0;
            }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mon hébergeur d'images</title>
</head>
<body>
    <header>
        <h1>Téléchargement de l'image</h1>
    </header>

    
    <div class="container">
        <section>
            <h2>Hébergez une image !!!</h2>

            <?php 
                if (isset($error) && $error == 0) {
                    echo '  <div id="picture">
                                <img src="'.$adress.'" id="image" />
                            </div>
                         ';
                }
            ?>

            <form method="post" action='index.php' enctype="multipart/form-data">

                <input type="file" required name="image"/><br>

                <div class="btn">
                    <button type="submit">Envoyer</button>
                
                </div>
            </form>
        </section>  
    </div>
        
    

</body>
</html>