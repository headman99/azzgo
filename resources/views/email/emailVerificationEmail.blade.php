<!--<h1>Verifica la tua mail</h1>
<div style="width: 100%;display:flex;justify-content: center;align-items: center;">
   <img src="https://app.azzgo.it/assets/img/appicon.png" width="549px" height="249px"></img> 
</div>
<div>
    Ciao <strong>{{$name}}</strong>.
    Per completare la registrazione è necessario procedere con la verifica dell' e-mail al seguente link
    <a href="{{ route('user.verify',$email)}}">Verifica</a>


</div>-->
<div id="main" style="width: 100%;height:500px;background-color:rgb(245, 245, 245);font-family: Roboto,SegoeUI,Helvetica,Arial,sans-serif;display:flex;flex-direction:row">
<div style="width:25%;height:100%;background-color:rgb(245, 245, 245);"></div>
    <div class="content" style="width:50%;min-width:340px;height:95%;background-color:white;border-bottom:20px solid #e9494f">
        <div id="image-container" style="width: 100%">
            <img src="https://app.azzgo.it/assets/img/appicon.png" style="width: 60%;height:60%;margin-left:20%;"></img>
        </div>
        <div style="margin-left:3%;margin-right:3%;font-size:15px">
            Ciao <strong>{{$name}}</strong>,
            <br>
            <br>
            <br>
            Ci sei quasi,per completare la registrazione è necessario procedere con la verifica dell' e-mail cliccando il bottone sottostante.
        </div>
        <div style="margin-left:3%;margin-top:50px;">
            <button type="button" style="width:120px;height:40px;border-radius:5px;background-color:#e9494f;border-width:0px">
                <a href="{{ route('user.verify',$email)}}" style="text-decoration:none;color:white;font-size:16px"><b>Verifica</b></a>
            </button>
        </div>

        <div style="margin-top:35px;margin-left:3%">
            grazie per aver creato un account con Azzgo.
        </div>
    </div>
    <div style="width:25%;height:100%;background-color:rgb(245, 245, 245);height:100%"></div>
</div>