<?php
require(__DIR__ . '/config.php');
session_unset();
session_destroy();
?>
<script>
     window.location.href = "<?=$url?>?m=logged-out";
</script>