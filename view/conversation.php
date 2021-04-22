<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Conversation</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <style type="text/css">
        body{
            
        }
            #zone-conversation{
                background-color : #0039cb;
                margin-top: 25px;
                height: 500px;
                width: 1000px;
                overflow : scroll;
                float: left;
                text-align:left;
                margin-bottom:25px;
                padding:10px;
                border:1px solid #ACD8F0;
                color : #fff;
                 }
            #message{
                width: 1000px;

                border:1px solid #ACD8F0;
                margin:0 auto;
            }
            .boutton{
                color : #00b0ff;
                background-color : #ffebee;
                border-radius : 5px;
                height: 50px;
                width: 150px;
            }
            .carte{
                width: 10px;
                height: auto;
            }
        </style>
    </head>
    <body >
        <div class="row">
            <div class=" col-lg-8"><h1 class="titre col-lg-12">CORONA VIRUS AU MAROC | MISE A JOUR QUOTIDIENNE!</h1> </div>
            <div class="carte col-lg-4"><img   class="img-responsive"  width="150" src="../images/drapeau-carte.jpg" alt="carte" ></div>
        </div>
        <header id="profil">
        <?php
        include "bienvenue.php";
        include "corona.php";
        ?>
        </header>
    
        <div id="zone-conversation"></div>
    
        <div id="zone-message">
            <input type="text" class="form-control float-left" id="message" placeholder="Ecrire un message">
            <p>
                <button class="btn btn-success float-left" onclick="sendMessage()">Envoyer</button>
            </p>
            
        </div>
        <script type="text/javascript">
            window.onload = loadMessage();
              
            //les deux fonctions
            function loadMessage(){
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function (){
                    if (xhr.readyState == 4 && xhr.status == 200){
                        document.getElementById("zone-conversation").innerHTML= xhr.responseText;
                    }else{
                        console.log(xhr.responseText);
                    }
                };
                xhr.open('GET',"../controller/message-controller.php?action=message",true);
                xhr.send();
            }

            function sendMessage(){
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function (){
                    if (xhr.readyState == 4 && xhr.status == 200){
                        var message = document.getElementById("message");
                        message.value = "";
                    }else{
                        console.log(xhr.responseText);
                    }
                };
                xhr.open('POST',"../controller/message-controller.php?action=send",true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send("message=" +message.value);
                loadMessage();
            }
            setInterval(loadMessage,1000);

        </script>
        
        
    </body>
</html>



 