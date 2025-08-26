<?php include("autologin.php"); ?>
<?php
include "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM docentes WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Docente eliminado correctamente'); window.location.href='listado.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
