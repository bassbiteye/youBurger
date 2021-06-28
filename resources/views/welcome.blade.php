<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>YouBurger</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */

    </style>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: Verdana, sans-serif;
            font-size: 15px;
            line-height: 1.5;
            background-color: #ffffff;
            background-image: url('images/logo.jpeg');
            background-repeat: "repeat";
            background-size: 6% 13%;
        }

    </style>
</head>

<body class="">
    <div class="" id="app">
        <payment-form></payment-form>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // initialize carousel
            const carousel = document.querySelectorAll('.carousel');
            M.Carousel.init(carousel, {
                fullWidth: true,
                indicators: true, // this option is require for autoplay functionnality
            });

            // custom function for autoplaying
            let indicatorItems = document.querySelectorAll('.carousel .indicator-item'),
                slideTime = 3000,
                activeClass = "active";

            setInterval(() => {
                indicatorItems.forEach(el => {
                    if (el.classList.contains(activeClass)) {
                        sib = el.nextElementSibling;
                        if (sib == null) {
                            indicatorItems[0].click();
                        } else {
                            sib.click()
                        }
                    }
                });
            }, slideTime);
        });

    </script>
</body>

</html>
