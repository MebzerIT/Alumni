<!-- Dette side er laget av Mebrahtu zerizghi -->
<?php require 'header.php'; ?>
    <style>
        /*internal styling*/
        table#messages {
            border-collapse: collapse;
            border-spacing: 0;
            width: 80%;
            display: block;
            margin: 50px 350px;
            border: 1px solid #ddd;
        }

        #messages th, #messages td {
            text-align: left;
            padding: 16px;
        }

        #messages tr:nth-child(even) {
            background-color: #e8e6f8;
        }
        textarea {
            width: 782px;
            height: 290px;
        }
        input{
            width: 782px;
        }
        input[type="submit"] {
            height: 50px;
        }

    </style>
    <main>
        <?php
        if (isset($_SESSION['idbruker'])){  //hvis dette fines i session

        //Oppdater fra ulest å lese
        $sql = "UPDATE meldinger set status='read' WHERE id='".$_GET['id']."' and to_user2=".$_SESSION['idbruker'];
        $result = mysqli_query($bd, $sql);

            //queryen kjekker bruker id  også brukeren får ikke lese meldingen hvis brukeren ikke er den riktig bruker
        $sql = "SELECT * FROM meldinger WHERE id='".$_GET['id']."' and to_user2=".$_SESSION['idbruker'];
        $result = mysqli_query($bd, $sql);
        ?>
        <form method="post" action="send_message.php">
        <table id="messages">
            <tr><th colspan="2"><h2 align="center">Privat Melding:</h2></th></tr>
            <?php
            if($row = mysqli_fetch_assoc($result)) { ?>
                <tr><th>Fra:</th><td><?php echo $row['from_username']; ?> <a href="insert_report.php?idbruker=<?php echo $row['from_user1']; ?>">(Rapporter <?php echo $row['from_username']; ?>)</a></td></tr>
                <tr><th>Subjekt:</th><td><?php echo $row['title']; ?></td></tr>
                <tr><th>Melding:</th><td><?php echo $row['message']; ?></td></tr>
                <tr><th>Dato:</th><td><?php echo $row['date_creation']; ?></td></tr>

            <?php   }

            }
            ?>

            <tr><th>Svare:</th>
                <td>
                    <input type="text" name="title" placeholder="Subject" value="Re:<?php echo $row['title']; ?>"><br><br>
                    <textarea name="message" placeholder="Message"></textarea>
                <br><input type="submit">
                    <input type="hidden" name="from_user1" value="<?php echo $_SESSION['idbruker']; ?>">
                    <input type="hidden" name="from_username" value="<?php echo $_SESSION['username']; ?>">
                    <input type="hidden" name="to_user2" value="<?php echo $row['from_user1']; ?>">
                </td></tr>
        </table>
        </form>
    </main>
<?php
mysqli_close($bd);
require 'footer.php'; ?>
