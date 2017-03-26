<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .reg li {
                display: inline-block;
            }
            a {
                text-decoration: none;
                color: inherit;
            }
            .next {
                float: right;
                margin-right: 0px;
                color: black;

            }
            .prev {
                float: left;
                display: inline-block;
                margin-left: -60px;
                margin-top: -30px;
                color: black;
            }
            .project {
                display: inline;
                padding-top: 100px;
                margin-left: -40px;
                text-align: center;
                height 300px;
            }
            .project li {
                justify-content: center;
                display: block;
                height: 100px;
            }
            .project-deprecated {
                display: inline;
                list-style-type: none;
                list-style-position: inside;
                padding: 10px;
                border-right-style: dotted;
                height: 100%;
            }
            .circle {
            	border-radius: 50%;
            	width: 500px;
            	height: 500px;
                border: 2px solid;
                margin-left: 35%;
                margin-top: 10%;
                color: #fff;
                text-align: center;
                font-size: 50px;
            	/* width and height can be anything, as long as they're equal */
            }

            .circle2 {
                width: 500px;
                height: 500px;
                border-radius: 50%;
                font-size: 50px;
                color: #fff;
                text-align: center;
                background: #000;
                margin-left: 35%;
                margin-top: 10%;
                -webkit-animation: mymove 5s;
                animation-timing-function: linear;
            }
            @keyframes mymove {
                from {left: 0px;}
                to {left: 300px;}
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                margin-top: 50px;
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .links input:not([type=submit]) {
                border: solid 5px;
                margin: 2px;
                height: 40px;
                min-width: 200px;
                border: none;
                padding: 5px 10px;
                color: black;
                background-color: white;
                color: rgba(0, 0, 0, 0.47);
                font-size: 16px;
                font-family: inherit;
            }
            .links input[type=submit] {
                margin: 2px;
                height: 40px;
                border: none;
                padding: 5px 10px;
                min-width: 100px;
                min-height: 50px;
                font-size: 18px;
                font-family: inherit;
            }
            ::-webkit-input-placeholder { /* Chrome/Opera/Safari */
              color: black;
            }
            ::-moz-placeholder { /* Firefox 19+ */
              color: black;
            }
            :-ms-input-placeholder { /* IE 10+ */
              color: black;
            }
            :-moz-placeholder { /* Firefox 18- */
              color: black;
            }
            .my-form {
                color: black !important;
                font-size: x-large !important;
            }
            .pt50 {
                padding-top: 50px;
            }
            ul {
              list-style-type: none;
            }
            .alert-ul {
                color: #d76565;
                font-size: x-large;
            }
        </style>
    </head>
    <body>
            <div class="content">
                <div class="title m-b-md">
                    Open Source Archive
                </div>

                <div class="links">
                    @if (count($errors))
                        <div class="alert">
                            <ul class="alert-ul">
                                @foreach ($errors->all() as $error)
                                    <li style="inline">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="post-project" action="/projects" method="POST">
                        {{ csrf_field() }}
                        <input class="my-form" type="text" name="name" placeholder="Your Name" required>
                        <input class="my-form" type="url" name="url" placeholder="Github Link" required>
                        <input class="my-form" type="text" name="description" placeholder="Two Word Description" required>
                        <input class="my-form" type="text" name="language" placeholder="Language Used" required>
                        <input class="my-form" type="email" name="email" placeholder="Email" required>
                        <input class="my-form" type="submit" name="submit" value="Submit">
                    </form>
                </div>
            </div>
            <hr>

            <div class="circle2">
                <div class="prev">
                    <p>Prev</p>
                </div>
                <div class="pt50">
                    <a href="{{$projects[0]['url']}}" class="direct-to">
                    <ul class="project">
                        <li>{{$projects[0]['name']}}</li>
                        <li>{{$projects[0]['description']}}</li> <li>{{$projects[0]['language']}}</li>
                    </ul>
                    </a>
                </div>
            <div class="next">
                <p>Next</p>
            </div>
            </div>
            <div>
                <p class="count" style="font-size: 50px;"></p>
            </div>

        </div>


    </body>
    <script src="https://code.jquery.com/jquery-3.2.0.min.js" charset="utf-8"></script>
    <script>
    function mod(n, m) {
        return ((n % m) + m) % m;
    }
    $stored_projects = <?= json_encode($projects); ?>;
    function get_new_project(count) {
        $name = $stored_projects[$count]["name"];
        $description = $stored_projects[$count]["description"];
        $language = $stored_projects[$count]["language"];
        return "<li>"+$name+"</li><li>"+$description+"</li><li>"+$language+"</li>";
    }
    $count = 0;
    $(".count").html($count);
    $(document).ready(function() {
        $length = <?= sizeof($projects) ?>;
        $(".prev").click(function() {
            $count = mod(($count - 1), $length);
            $(".count").html($count);
            $(".project").html(get_new_project($count));
            $(".direct-to").attr('href', $stored_projects[$count]["url"]);
        });
        $(".next").click(function() {
            $count = mod(($count + 1), $length);
            $(".count").html($count);
            $(".project").html(get_new_project($count));
        });
    });
    </script>
</html>
