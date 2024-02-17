<?php
if(!isset($_SESSION['access-control'])){
?>
<script>
    window.location.href = "<?=$url?>staff-login?m=un-athorized access";
</script>
<?php
}
?>