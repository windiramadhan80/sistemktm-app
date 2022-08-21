<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    {{-- Boostrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    {{-- font awesome --}}
    <script src="https://kit.fontawesome.com/97d7d4947a.js" crossorigin="anonymous"></script>

</head>

<body>
    @include('home.templates.navbar')

    @yield('content')

    {{-- Javascript Boostrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>

    <script src="/node_modules/html2canvas/dist/html2canvas.js"></script>

    {{-- html2canvas fitur download file image --}}
    <script type="text/javascript">
        const download = document.querySelector('#download');
        download.addEventListener("click", function() {
            screenshot();
        })

        function screenshot() {
            html2canvas(document.getElementById("ktm")).then(function(canvas) {
                downloadImage(canvas.toDataURL(), "KartuTandaMahasiswa.png");
            });
        }

        function downloadImage(uri, filename) {
            const link = document.createElement('a');
            if (typeof link.download !== 'string') {
                window.open(uri);
            } else {
                link.href = uri;
                link.download = filename;
                accountForFirefox(clickLink, link);
            }
        }

        function clickLink(link) {
            link.click();
        }

        function accountForFirefox(click) {
            const link = arguments[1];
            document.body.appendChild(link);
            click(link);
            document.body.removeChild(link);
        }
    </script>


</body>

</html>
