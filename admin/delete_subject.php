<?php
include '../database/db_con.php';
if (isset($_POST['delete_subject'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysqli_query($link,"DELETE FROM subject where subject_id='$id[$i]'");
}
?>
<script>
	window.location = "subjects.php";
</script>

<?php
}
?>