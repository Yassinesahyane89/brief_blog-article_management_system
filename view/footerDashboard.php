
</section>
    <script>
        <?php if(isset($_SESSION['message'])): ?>
            Swal.fire({
                position: 'center',
                icon: "<?php echo $_SESSION['icon']; ?>",
                title: "<?php echo $_SESSION['message']; ?>",
                showConfirmButton: false,
                timer: 1500
                });
            <?php unset($_SESSION['message']);unset($_SESSION['icon']); ?>
        <?php endif; ?>
    </script>
    <script src="../assets/js/DashboardScript.js"></script>
</body>
</html>