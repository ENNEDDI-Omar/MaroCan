<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(session('success'))
    <script>
        // Afficher une alerte de succès avec SweetAlert
        swal.fire({
            title: 'Succès!',
            text: '{{ session('success') }}',
            icon: 'success',
            button: 'OK'
        });
    </script>
@endif

@if(session('error'))
    <script>
        // Afficher une alerte d'erreur avec SweetAlert
        swal.fire({
            title: 'Erreur!',
            text: '{{ session('error') }}',
            icon: 'error',
            button: 'OK'
        });
    </script>
@endif
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</body>

</html>
