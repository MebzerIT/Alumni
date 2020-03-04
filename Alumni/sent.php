<!-- Dette side er laget av Mebrahtu zerizghi -->
<?php // tilkobling
require_once('Ny_index.php');
require 'header.php';
 ?>
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
    tr.unread {
        font-weight: 600;
    }
    @media screen and (max-width: 600px) {
      table#messages {
          width: 100%;
          margin: 50px 20px;}
    textarea {
              width: 282px;
              height: 190px;
          }
    input{
              width: 282px;
          }
    input[type="submit"] {
              height: 30px;
          }


   }
  @media (min-width: 601px) and (max-width: 1000px) {
    table#messages {
        width: 70%;
        margin: 50px 80px;}
  textarea {
            width: 482px;
            height: 190px;
        }
  input{
            width: 482px;
        }
  input[type="submit"] {
            height: 30px;
        }

  }

</style>
<main>
<?php
if (isset($_SESSION['message'])){       // visning og sletting av melding hvis det er finnes i session
    echo '<h3 align="center">'.$_SESSION['message'].'</h3>';
    unset($_SESSION['message']);
}

if (isset($_SESSION['idbruker'])){  //hvis dette finnes i session
    $sql = "SELECT brukerNavn as to_user, title, message, date_creation, meldinger.status FROM meldinger
inner join bruker on (to_user2=idbruker)
WHERE from_user1=".$_SESSION['idbruker'];
    $result = mysqli_query($bd, $sql);
?>
    <table id="messages" align="center">
        <tr>
            <th colspan="2"><h2>Sendte Meldinger</h2></th>
            <th><a href="new_message.php">Ny Melding</a></th>
            <th><a href="inbox.php">Innboxs</a></th>
        </tr>
        <tr>
            <th>Til</th>
            <th>Subjekt</th>
            <th>Oversikt</th>
            <th>Dato</th>
        </tr>
<?php
        while($row = mysqli_fetch_assoc($result)) { ?>
        <tr class="<?php echo $row['status']; ?>">
            <td><?php echo $row['to_user']; ?></td>
            <td><a href="read_message.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a> </td>
            <td><?php echo substr($row['message'], 0, 60); ?>...</td>
            <td><?php echo $row['date_creation']; ?>...</td>
        </tr>
<?php   }
    mysqli_close($bd);
}
?>
</main>
<?php require 'footer.php'; ?>
