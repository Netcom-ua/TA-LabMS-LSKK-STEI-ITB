<?php
if(!isset($_SESSION['email']))
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