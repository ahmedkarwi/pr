<?php
include "../controller/eventC.php";

$c = new eventC();
$tab = $c->listevent();

?>

<center>
    <h1>List of events</h1>
    <h2>
        <a href="addevent.php">Add event</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>id</th>
        <th>nom</th>
        <th>place</th>
        <th>type</th>
        <th>date</th>
        <th>description</th>
        <th>prix</th>
    </tr>


    <?php
    foreach ($tab as $event) {
    ?>




        <tr>
            <td><?= $event['event_id']; ?></td>
            <td><?= $event['nom']; ?></td>
            <td><?= $event['place']; ?></td>
            <td><?= $event['type']; ?></td>
            <td><?= $event['date']; ?></td>
            <td><?= $event['description']; ?></td>
            <td><?= $event['prix']; ?></td>
            <td align="center">
                <form method="POST" action="updateevent.php">
                    <input type="submit" nom="updateevent" value="updateevent">
                    <input type="hidden" value=<?PHP echo $event['event_id']; ?> nom="event_id">
                </form>
            </td>
            <td>
                <a href="deleteevent.php?id=<?php echo $event['event_id']; ?>">delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>