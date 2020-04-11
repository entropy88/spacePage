<!DOCTYPE html>

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-161412518-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-161412518-1');
    </script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="космически календар">
    <meta name="keywords"
        content="фази на луната, метеорен поток, космос, съзвездия,  космически изображения, видео от космоса">
    <meta name="author" content="EntropyStarRover">

    <link rel="shortcut icon" type="image/png" href="favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="starLover.css">
    <title>Космически календар</title>

</head>

<body onload="starLover();">
    <script src="moonFetcher.js"></script>

    <div class="parent">
         <div class="menuDiv">
            <button class="buttonsMenu" onclick="window.location.href = 'bib.html';">Библиограф онлайн</button>
            <button class="buttonsMenu" onclick="window.location.href = 'articles.html';"> Статии</button>
            <button class="buttonsMenu" onclick="window.location.href = 'resources.html';">Ресурси</button>
            <button class="buttonsMenu" onclick="window.location.href = 'about.html';">За сайта</button>

        </div>

        <div class="columnLeft">
            <div id="moonContainer">
                <p id="date">def</p>
                <p id="phase"></p>
                <img id="moonPicture"></img>
            </div>

            <div class="div2"> </div>
        </div>


        <div class="middleSectionImageOfTheDay">
            
            <div id="imageContainer" class="imageContainer">
                <h2>Космическо изображение на деня</h2>
            </div>
        </div>

        <div class="middleSectionEncyclopediaArticle">
            <h2>Статия на деня</h2>

            <div id="encArt">
                <p id="encTitle"></p>
                <p id="encContent"></p>
                <img id="encPicture"></img>
                <p id="encSources"></p>

                <?php
                $user="displayer";
                $pass="";
                $db="space";
                $dbcon=new mysqli("localhost", $user,$pass, $db) or die ("unable to connect");
                $sql = "SELECT title, description, imageUrl, sources FROM encyclopedia ORDER BY rand() limit 1";
                $result = $dbcon->query($sql);
            
            
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                                  $entryArray=array($row["title"],$row["description"],$row["imageUrl"], $row["sources"]);
                                  echo $entryArray;
                }           
            
            } else {
                echo "0 results";
            }
            
            $dbcon->close();            
            ?>
<script type="text/javascript">
let jArray = <?php echo json_encode($entryArray); ?>;
let encTitle=document.getElementById("encTitle");
encTitle.innerText=jArray[0];
let encContent=document.getElementById("encContent");
encContent.innerText=jArray[1];

let encPicture=document.getElementById("encPicture");
encPicture.src=jArray[2];
let encSources=document.getElementById("encSources");
encSources.innerText=jArray[3];


</script>

            </div>
            </div>

        <div id="rightCol" class="columnRight">

            <h1>Предстоящи метеорни потоци</h1>

            <p>22 Април, Сряда: 09:07<br>
                Метеорен поток в съзвездието Лира</br> ЗЧЧ = 20</p>

            <p>04 Май, Понеделник: 00:08<br>
                Метеоритен поток η/ета/ Аквариди в съзвездието Водолей</br> ЗЧЧ = 60</p>
            <p>28 Юли, Вторник: 00:08<br>
                Метеоритен поток ι/йота/ Аквариди в съзвездието Водолей</br> ЗЧЧ = 20</p>

            <p>12 Август, Сряда: 16:02<br>
                Метеоритен поток Персеиди в съзвездието Персей</br> ЗЧЧ = 90</p>

            <p>21 Октомври, Сряда: 08:21<br>
                Метеорен поток Ориониди в съзвездието Орион</br> ЗЧЧ = 20</p>

            <p>05 Ноември, Четвъртък: 07:50<br>
                Метеоритен поток Южни Тауриди в съзвездието Бик</br> ЗЧЧ = 10</p>

            <p>12 Ноември, Четвъртък: 07:06<br>
                Метеоритен поток Северни Тауриди в съзвездието Бик</br> ЗЧЧ = 15</p>

            <p>17 Ноември, Вторник: 07:06<br>
                Метеорен поток Леониди в съзвездието Лъв</br> ЗЧЧ = 15</p>

            <p>14 Декември, Понеделник: 02:35<br>
                Метеорен поток Джеминиди в съзвездието Близнаци</br> ЗЧЧ = 120</p>

            <p>22 Декември, Вторник: 11:00<br>
                Метеорен поток Урсиди в съзвездието Малка мечка</br> ЗЧЧ = 10</p>

        </div>



    </div>

    <div class="footDiv">
        <p>Лунните фази използват данни от <a href="http://www.farmsense.net/">farmsense.net</a>. Космическото изображение/видео на деня се
            извлича
            от <a href="https://apod.nasa.gov/apod/">NASA APOD/</a>. Информацията за метеорните потоци се извлича от<a href=" https://eclipse.gsfc.nasa.gov/SKYCAL/SKYCAL.html">
            NASA SKYCAL.</p>

    </div>

</body>

</html>