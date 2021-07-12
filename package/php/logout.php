<?php
    session_start();
    if (isset($_SESSION['login'])) {
        session_destroy();
        ?>
			<script type="text/javascript">
				window.location.assign('../home');
			</script>
		<?php
    }
?>


