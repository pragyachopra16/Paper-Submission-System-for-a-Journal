
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$(".delete-form").on('submit', function(event){
	 if(!confirm("Are you sure?")) event.preventDefault();
});
</script>
</body>
</html>
