<div>

    @vite(['resources/assets/vendor/libs/sweetalert2/sweetalert2.scss', 'resources/assets/vendor/libs/sweetalert2/sweetalert2.js'])

    <script>
        window.addEventListener('swal', function(e) {
            Swal.fire({
                position: "center",
                icon: e.detail[0].icon, //error or success
                title: e.detail[0].title,
            });
        });
    </script>
</div>
