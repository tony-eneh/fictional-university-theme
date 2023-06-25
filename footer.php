
<p>Greetings from footer.php &copy;<span></span></p>

<script>
    const copyright = document.querySelector('span');
    copyright.textContent = new Date().getFullYear()
</script>
<?php wp_footer() ?>
</body>
</html>