

<?php

include '../controller/eventC.php';
include '../model/event.php';
$error = "";

// create client
$event = null;
// create an instance of the controller
$eventC = new eventC();


if (
    isset($_POST["nom"]) &&
    isset($_POST["place"]) &&
    isset($_POST["type"]) &&
    isset($_POST["date"]) &&
    isset($_POST["description"]) &&
    isset($_POST["prix"]) 
) {
    $date = new DateTime($_POST('date'));
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["place"]) &&
        !empty($_POST["type"]) &&
        !empty($_POST["date"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["prix"]) 
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $event = new event(
            null,
            $_POST['nom'],
            $_POST['place'],
            $_POST['type'],
            $date,
            $_POST['description'],
            $_POST['prix']
        );
        var_dump($event);
        
        $eventC->updateevent($event, $_POST['event_id']);

        header('Location:listevent.php');
    } else
        $error = "Missing information";
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listevent.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['event_id'])) {
        $event = $eventC->showevent($_POST['event_id']);
    ?>

        <form action="" method="POST">
            <table>
            <tr>
                    <td><label for="id">id :</label></td>
                    <td>
                        <input type="int" id="id" name="event_id" value="<?php echo $_POST['event_id'] ?>" readonly />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="nom">Nom :</label></td>
                    <td>
                        <input type="text" id="nom" name="nom" value="<?php echo $event['nom'] ?>" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="place">Place :</label></td>
                    <td>
                        <input type="text" id="place" name="place" value="<?php echo $event['place'] ?>" />
                        <span id="erreurPlace" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="type">type :</label></td>
                    <td>
                        <input type="text" id="type" name="type" value="<?php echo $event['type'] ?>" />
                        <span id="erreurtype" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="date">date :</label></td>
                    <td>
                        <input type="date" id="date" name="date" value="<?php echo $event['date'] ?>" />
                        <span id="erreurdate" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                <td><label for="description">description :</label></td>
                    <td>
                        <input type="text" id="description" name="description" value="<?php echo $event['description'] ?>" />
                        <span id="erreurdescription" style="color: red"></span>
                    </td>
                </tr>
                <tr>

                <td><label for="prix">prix :</label></td>
                    <td>
                        <input type="int" id="prix" name="prix" value="<?php echo $event['prix'] ?>" />
                        <span id="erreurprix" style="color: red"></span>
                    </td>
                </tr>
                

                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>

        </form>
    <?php
    }
    ?>
</body>

</html>