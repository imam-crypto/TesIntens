<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Tes Intens</title>
    <style>
        * {
            font-family: 'Quicksand';
            margin: 5px;

        }

        .mapid {
            height: 180px;
        }
    </style>
</head>

<body>

    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <h1 class="text text-center m-2"> Kasus Sebaran Covid19</h1>

                <!-- Optional JavaScript; choose one of the two! -->

                <!-- Option 1: Bootstrap Bundle with Popper -->
                {{$chart->container()}}

                {{$chart->script()}}



            </div>
        </div>
        <div class="col-md-12">
            <div id="mapid" style="height: 400px"></div>
        </div>
        <div class="col m-2">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Kode Provinsi</th>
                        <th>Provinsi</th>
                        <th>Kasus Positif</th>
                        <th>Kasus Sembuh</th>
                        <th>Kasus Meninggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse (json_decode($get) as $cc )
                    <tr>
                        <th>{{$cc->Kode_Provi}}</th>
                        <td>{{$cc->Provinsi}}</td>
                        <td>{{$cc->Kasus_Posi}}</td>
                        <td>{{$cc->Kasus_Semb}}</td>
                        <td>{{$cc->Kasus_Meni}}</td>
                    </tr>
                    @empty

                    @endforelse


                </tbody>
            </table>
        </div>

    </div>


    <div class="col-md-12">

        <div class="row">

        </div>
        <div class="container">
            <h1 class="text text-center m-2">Data Kasus Meniggal Karena Covid19</h1>

            {{$chart2->container()}}

            {{$chart2->script()}}
        </div>
    </div>
    <script>
        var mymap = L.map('mapid').setView([-6.9232122745144435, 107.6043586837268], 13);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiaW1hbTE4IiwiYSI6ImNrdWh4MzloazA0ZWQycG82dXBzY3I0OWYifQ.H3mssfihGe5m2oJ4Ur8__w', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoiaW1hbTE4IiwiYSI6ImNrdWh4MzloazA0ZWQycG82dXBzY3I0OWYifQ.H3mssfihGe5m2oJ4Ur8__w'
}).addTo(mymap);
var marker = L.marker([51.5, -0.09]).addTo(mymap);
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
