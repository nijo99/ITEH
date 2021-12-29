<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
        <title>Fetch Data From MySQL Database using AJAX in PHP</title>
        <script>
            function showSuggestion(str){
                if(str.lenght == 0){
                    document.getElementById('output').innerHTML='';

                }else{
                    
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange= function(){
                        if(this.readyState==4 && this.status==200){
                            document.getElementById('output').innerHTML = this.responseText;
                        }
                    }
                    xmlhttp.open("GET", "suggest.php?q="+str, true);
                    xmlhttp.send();

                }
            }
        </script>
    </head>
    <body>

    
        <div class="container">
            <h4>Programska šema</h4>
            <table class="table">
                <tr>
                    <th>Naziv</th>
                    <th>Vreme</th>
                    <th>Radni dan</th>
                </tr>
                <tbody id="data">

                </tbody>
            </table>
        </div>

        <div>
            <form method="POST" action="#">
                <button type="submit" name="radniDan">Radni dan</button>
                <button type="submit" name="vikend">Vikend</button>
            </form>
        </div>

        <div class="container">
            <h1>Pretrazi kategoriju</h1>
            <form>
                Kategorija: <input type="text" class="form-control"
                onkeyup="showSuggestion(this.value)">
            </form>
            <p>Predlozi: <span id="output" style="font-weight:bold"></span>

            </p>
        </div>


        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="ajax-script.js"></script>

    </body>
</html>