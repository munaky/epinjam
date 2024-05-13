<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>{{ current($data)['item_code'] }}  ---  {{ end($data)['item_code'] }}</title>
    <style>
        html {
            width: 210mm;
            min-width: 210mm;
            max-width: 210mm;
        }

        svg {
            width: 100%;
            height: min-content;
        }

        p {
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="row row-cols-4 g-1" id="result">
        @foreach ($data as $x)
            <div class="col text-center">
                {{ $x['qrcode'] }}
                <strong>
                    <p class="text-break">{{ $x['item_code'] }}</p>
                </strong>
            </div>
        @endforeach
    </div>

    <script>
        window.print();
        window.onafterprint = () => {
            window.close();
        }
    </script>
</body>

</html>
