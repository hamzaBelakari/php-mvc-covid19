<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <title>Corona</title>
    </head>
    <body>
        <div>
            <button  id="nbreTotal" class="btn btn-primary">Nombre total de cas : </button>
            <button  id="nbreGuerisons" class="btn btn-success">Nombre de guérisons: </button>
            <button  id="nbreDeces" class="btn btn-danger">Nombre de décès: </button>
            <button  id="nbreToday" class="btn btn-warning">Nombre cas aujourd'hui: </button>
        </div>
        
    </body>
    <script>
        window.onload = covidData();
        function covidData(){
			var xhr=new XMLHttpRequest;
			xhr.onreadystatechange=function(){
				if(xhr.readyState==4 && xhr.status==200){
					var data=JSON.parse(xhr.responseText);
					var total=data[data.length-1].Confirmed;
					var death=data[data.length-1].Deaths;
					var recovered=data[data.length-1].Recovered;
					var active=data[data.length-1].Active;
					document.getElementById('nbreTotal').append(total);
					document.getElementById('nbreGuerisons').append(recovered);
					document.getElementById('nbreDeces').append(death);
					document.getElementById('nbreToday').append(active);

				}
			};
			xhr.open('GET',"https://api.covid19api.com/live/country/morocco",true);
			xhr.send();
		}
    </script>
</html>