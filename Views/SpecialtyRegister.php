<?php
session_start();
if($_SESSION['accountRole'] == 1 and 2){
    require_once("../Controllers/SpecialtyController.php");
    specialtyList();
    specialtyInsert();
} else {
    header("Location: /Views/Index.php");
}


include("Components/Head.php");
include("Components/Nav.php");
?>
<main role="main" class="container">
    <div class="containter p-3">
        <h1>Cadastrar Especialidade</h1>
    </div>

    <div class="container position-relative mb-4">

        <form class="form-inline my-2 my-lg-0 mb-3" method="post">
            <label class="m-sm-2" for="lastName">Especialidade</label>
            <input class="m-sm-2 form-control" type="text" id="specialtyNome" name="specialtyNome">
            <input class="m-sm-2 btn btn-primary" id="add" type="submit" name="add" value="Cadastrar">
        </form>

        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Especialidade</td>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($rowSpecialty = mysqli_fetch_array($rsSpecialty)) {
                    echo "<tr>";
                    echo "<td>" . $rowSpecialty['specialtyId'] . "</td>";
                    echo "<td>" . $rowSpecialty['specialtyNome'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</main>
<?php include("Components/Scripts.php"); ?>