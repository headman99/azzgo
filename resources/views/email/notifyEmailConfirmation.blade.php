<html>

<head>
    <link href="{{asset('css/notifyEmailConfirmation.css') }}" rel="stylesheet">
</head>

<body>
    <div class="main flex">
        <div class="container">
            <div class="header" style="background-color: #e9494f;">
                <span style="color:white">
                    <h2>Verifica Mail</h2>
                </span>
            </div>
            <div id="logo">
                <img src="https://app.azzgo.it/assets/img/appicon.png" />
            </div>
            @switch($result)
            @case(1)
            <div class="content green">
                <div class="message">
                    <div>
                        <h2>{{$message}}</h2>
                        <span>
                            Effettua il 
                            <a href="https://app.azzgo.it/login"><b>login</b></a>
                            per procedere.
                        </span>
                        
                    </div>
                </div>
            </div>
            @break

            @case(0)
            <div class="content red">
                <div class="message">
                    <div>
                        <h2>{{$message}}</h2>
                        <span>
                            <a href="https://app.azzgo.it/signup" >Registrati</a>
                            per procedere.
                        </span>
                    </div>
                </div>
            </div>
            @break

            @case(-1)
            <div class="content yellow">
                <div class="message">
                    <div>
                        <h2>{{$message}}</h2>
                        <span>Effettua il
                            <a href="https://app.azzgo.it/login"><b>login</b></a>
                            per accedere.</span>
                    </div>
                </div>
            </div>
            @break
            @endswitch


        </div>
    </div>
</body>

</html>