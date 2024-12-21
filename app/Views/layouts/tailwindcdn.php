    <!-- style -->
    <script src="https://kit.fontawesome.com/328128838d.js" crossorigin="anonymous"></script>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

    <style>
        @font-face {
            font-family: 'Mulish';
            src: url("/fonts/Mulish-VariableFont_wght.ttf") format("truetype");
        }
    </style>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        mulish: ['Mulish', 'sans-serif'],
                    },
                    colors: {
                        primary: '#0067FF',
                        gray: '#757575',
                    }
                },
            },
        };
    </script>