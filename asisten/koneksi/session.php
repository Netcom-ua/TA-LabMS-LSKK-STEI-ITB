<?php
if(!isset($_SESSION['id_pengenal']))
{
echo "<script>
				alert('Anda harus login dulu');
			setTimeout(function() {
					document.location.href='../index.php';
			}, 1000);
			</script>";
exit;
}
?>