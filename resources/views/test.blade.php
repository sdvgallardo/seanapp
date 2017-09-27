<!DOCTYPE html>
<html>
<body>

<p>Click the button to open a new console</p>

<button onclick="myFunction()">Open console</button>

<script>
function myFunction() {
    window.open("/webconsole.php", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
}
</script>

</body>
</html>
