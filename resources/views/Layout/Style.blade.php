<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
<link href="{{ publicPath('/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
<link href="{{ publicPath('/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link id="pagestyle" href="{{asset('assets/css/material-dashboard.css?v=3.2.0')}}" rel="stylesheet" />
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let path = window.location.pathname;
        let pageName = path.substring(path.lastIndexOf("/") + 1);

        pageName = pageName.charAt(0).toUpperCase() + pageName.slice(1);

        if (pageName) {
            document.getElementById("breadcrumb-page-name").innerText = pageName;
        } else {
            document.getElementById("breadcrumb-page-name").innerText = "Home";
        }
    });
</script>