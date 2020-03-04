<!-- Dette side er laget av Mebrahtu zerizghi -->
<?php
// kode for tilkobling og henting av data
require 'connection.php';
$sql = "SELECT * FROM regler";
$result = $bd->query($sql);
include "header.php";
?>
<!-- internal css  -->
<style>

    table.zebra {
        border-collapse: collapse;
        border-spacing: 0;
        width: max-content;
        display: block;
        margin: 50px 350px;
        border: 1px solid #ddd;
    }

    .zebra th, .zebra td {
        text-align: left;
        padding: 16px;
    }

    .zebra tr:nth-child(even) {
        background-color: #e8e6f8;
    }
    textarea{
        width: 546px; height: 116px; margin: 0px;
    }
    @media screen and (max-width: 600px) {
      table.zebra {
          margin: 50px 5px;

      }
      textarea{
          width: 80px; height: 116px; margin: 0px;
      }
   }
  @media (min-width: 601px) and (max-width: 1000px) {
    table.zebra {
        margin: 50px 120px;

    }
    textarea{
        width: 150px; height: 116px; margin: 0px;
    }

  }
</style>
<!-- table for visning av lagde regeler og for lagering av nye regler -->
<table class="zebra" style="border: 1px solid black">
    <tr>
        <th>Regelnavn</th>
        <th>Beskrivelse</th>
        <th>Oppdater</th>
        <th>Slett</th>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <form action="update_rule.php" method="post">
                <td><input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="text" name="regelnavn" value="<?php echo $row['regelnavn']; ?>"></td>
                <td><textarea name="beskrivelse"><?php echo $row['beskrivelse']; ?></textarea></td>
                <td><input type="submit"></td>
                <td><a href="delete_rule.php?id=<?php echo $row['id']; ?>">Slett regel</a></td>
                </form>
            </tr>

        <?php
    } ?>

    <tr>
        <form action="insert_rule.php" method="post">
        <td>
            <input type="text" name="regelnavn" placeholder="Add new rule"></td>
        <td><textarea name="beskrivelse" eplaceholder="Add description here"></textarea></td>
        <td colspan="2"><input type="submit" value="Insert new rule"></td>
        </form>
    </tr>


</table>
<?php $bd->close();
include "footer.php";
?>
