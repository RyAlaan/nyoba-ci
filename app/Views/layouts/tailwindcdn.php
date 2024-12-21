    <!-- style -->
    <script src="https://cdn.tailwindcss.com"></script>

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