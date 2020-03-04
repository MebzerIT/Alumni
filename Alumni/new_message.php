 <!-- Dette side er laget av Mebrahtu zerizghi   -->
<?php require 'header.php'; //tilkobling
 require_once('Ny_index.php');?>
<style>
    /*internal styling*/
    table#messages {
        border-collapse: collapse;
        border-spacing: 0;
        width: 50%;
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
<?php
$sql = "SELECT idbruker, brukerNavn FROM bruker WHERE idbruker!=".$_SESSION['idbruker'].' order by brukerNavn'; // query for å hente og vise all brukere
$result = mysqli_query($bd, $sql);
$select = "";
while ($row = $result->fetch_assoc()){
    extract($row);
    $select.="<option value='$idbruker'>$brukerNavn</option>";
}

?>
<main>
 <form method="post" action="send_message.php"> <!-- form fo  sending av ny melding -->
    <table id="messages">
        <tbody><tr><th colspan="2"><h2 align="center">Privat Melding:</h2></th></tr>
        <tr><th>Fra:</th><td><?php echo $_SESSION['username']; ?></td></tr>
        <tr><th>Til:</th><td>
                <select name="to_user2">
                    <?php echo $select; ?>
                </select></td></tr>
        <tr><th>Svare:</th>
            <td>
                <input type="text" name="title" placeholder="Subject"><br><br>
                <textarea name="message" placeholder="Message"></textarea>
                <br><input type="submit">
                <input type="hidden" name="from_user1" value="<?php echo $_SESSION['idbruker']; ?>">
                <input type="hidden" name="from_username" value="<?php echo $_SESSION['username']; ?>">
            </td></tr>
        </tbody></table>
</form>
<?php
require 'footer.php'; ?>
