<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Awebon</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/main.css') }}">

    </head>
    <body>
        <div class="main">
            <input type="checkbox" name="{{$members[0]->id}}" class="ck{{$members[0]->id}}" onclick="toggle({{$members[0]->id}})" checked>
            {{ $members[0]->first_name ?? "" }}
            {{ $members[0]->last_name ?? "" }}
            ({{ $members[0]->designation ?? "" }})
            <br>

            @foreach($associates[$members[0]->id] as $key1 => $data1)
                &emsp; <input type="checkbox" name="{{$data1->id}}" class="id{{$members[0]->id}} ck{{$data1->id}}" onclick="toggle({{$data1->id}})" checked>
                {{ $data1->first_name ?? "" }} {{ $data1->last_name ?? "" }} ({{ $data1->designation ?? "" }})
                <br>

                @if($data1->id < count($associates))
                @foreach($associates[$data1->id] as $key2 => $data2)
                    &emsp;&emsp; 
                    <input type="checkbox" name="{{$data2->id}}" class="id{{$members[0]->id}} id{{$data1->id}} ck{{$data2->id}}" onclick="toggle({{$data2->id}})" checked>
                    {{ $data2->first_name ?? "" }}  {{ $data2->last_name ?? "" }} ({{ $data2->designation ?? "" }})
                    <br>

                    @if($data2->id < count($associates))
                    @foreach($associates[$data2->id] as $key3 => $data3)
                            &emsp;&emsp;&emsp; 
                            <input type="checkbox" name="{{$data3->id}}" class="id{{$members[0]->id}} id{{$data1->id}} id{{$data2->id}}">
                            {{ $data3->first_name ?? "" }}  {{ $data3->last_name ?? "" }} ({{ $data3->designation ?? "" }})
                            <br>
                    @endforeach
                    @endif

                @endforeach
                @endif

            @endforeach

        </div>
    </body>

    <script type="text/javascript">
        function toggle(id) {
            var ckboxes = document.querySelectorAll(`.id${id}`);
            var stat = document.querySelectorAll(`.ck${id}`)[0].checked;
            for(var i = 0; i < ckboxes.length; i++) {
                ckboxes[i].checked = !ckboxes[i].checked;
                ckboxes[i].checked = stat;
            }
        }
    </script>
</html>
