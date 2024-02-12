<?php
    date_default_timezone_set('America/Sao_Paulo');
    include 'dbh.inc.php';
    include 'comments.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>* ﾟ｡*･｡. Map</title>
<style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        .background{
            position: fixed; 
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            pointer-events: none;
        }
        .protocolo {
            position: absolute;
            width: 60px;
            top: 75%;
            left: 45%;
            transform: translate(-50%, -50%);
            z-index: 2;
        }
        .gravadores {
            position: absolute;
            width: 90px;
            top: 48%;
            left: 82%;
            transform: translate(-50%, -50%);
            z-index: 1;
        }
        .passagem{
            position: absolute;
            width: 150px;
            top: 50%;
            left: 11%;
            transform: translate(-50%, -50%);
            z-index: 3;
        }
        .blackcircle{
            position: absolute;
            width: 100px;
            top: 40%;
            left: 24%;
            transform: translate(-50%, -50%);
            z-index: 1;
        }
        .blackcircle2{
            position: absolute;
            width: 50px;
            top: 55%;
            left: 42%;
            transform: translate(-50%, -50%);
            z-index: 1;
        }
        .box {
            position: absolute;
            width: 72px;
            top: 35%;
            right: 25%;
            transform: translate(-50%, -50%);
            z-index: 2;
        }
        .box2 {
            position: absolute;
            width: 62px;
            top: 80%;
            left: 18%;
            transform: translate(-50%, -50%);
            z-index: 3;
        }
        .cityQuote {
            position: absolute;
            padding: 50px;
            width: 70%;
            animation: fadeIn 3s ease-in-out forwards; /* Increased duration for a slower appearance */
        }
        .foreground {
            position: fixed; 
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 2;
            pointer-events: none;
        }
        .middleground {
            position: fixed; 
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            pointer-events: none;
        
        }
        #popup {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #333;
            color: #fff;
            border-radius: 10px;
            border-color: rgb(154, 152, 152);
            border-style: solid;
            border-width: 1px; /* Added to make the border thinner */
            padding: 15px;
            z-index: 3;
            width: 35%;
            
        }
        #popupText {
            color: #fff;
            text-align: center;
            margin-left: 2px;
            
        }
        .popupTitle {
            position: absolute;
            top: -25px; /* Adjusted to position just outside the pop-window */
            left: 0;
            font-size: 12px;
            background: #da1111;
            color: #ffffff;
            border-radius: 10px;
            border-color: #da1111;
            border-style: solid;
            border-width: 1px;
            padding: 4px;
        }
        
        #exit {
            position: absolute;
            top: 0;
            right: 0;
            color: #fff;
            background: #333;
            border: none;
            cursor: pointer;
        }
        
        #readButton {
            display: inline-block;
            margin: 10px;
            margin-bottom: 0;
            padding: 10px 50px;
            background: #333;
            color: #fff;
            border: 1px solid rgb(154, 152, 152)y;
            border-radius: 5px;
            cursor: pointer;
        }
        
        #buttonContainer {
            display: flex;
            justify-content: center;
            
        }
        .intel{
            position: absolute;
            top: -25%; /* Adjusted to position just outside the pop-window */
            right: auto;
            font-size: 12px;
            background: #767575;
            color: #fff;
            border-radius: 10px;
            border-color: #767575;
            border-style: solid;
            border-width: 1px; 
            z-index: 4;
            width: auto;
            height: fit-content;
        }
        .intel p {
            margin: 0;
            padding: 4px;
        }
        .menu{
            position: absolute;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
            background: #333;
            color: #fff;
            border-radius: 10px;
            border-color: rgb(154, 152, 152);
            border-style: solid;
            border-width: 1px; 
            border-right: 0px;
            border-top-right-radius: 0px;
            border-bottom-right-radius: 0px;
            padding-bottom: 10px;/* Added to make the border thinner */
            z-index: 3;
            width: auto;
            display: flex;
            flex-direction: column;
        }
        .menu button{
            z-index: 3;
            margin: 15px;
            display: inline-block;
            margin: 5px;
            margin-bottom: 0;
            padding: 10px 50px;
            background: #333;
            color: #fff;
            font-size: 10px;
            border: 1px solid rgb(154, 152, 152)y;
            border-radius: 5px;
            cursor: pointer;
        }
        .menu2{
            position: absolute;
            bottom: 0;
            left: 5%;
            background: #333;
            color: #fff;
            border-radius: 10px;
            border-color: rgb(154, 152, 152);
            border-style: solid;
            border-width: 1px; 
            border-bottom: 0px;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0px;
            padding-bottom: 10px;/* Added to make the border thinner */
            z-index: 4;
            width: auto;
            display: flex;
            flex-direction: column;
        }
        .menu2 button{
            z-index: 4;
            margin: 15px;
            display: inline-block;
            margin: 5px;
            margin-bottom: 0;
            padding: 10px 50px;
            background: #333;
            color: #fff;
            font-size: 10px;
            border: 1px solid rgb(154, 152, 152)y;
            border-radius: 5px;
            cursor: pointer;
        }
        .footer{
            position: fixed;
            bottom: 0;
            right: 0;
            z-index: 4;
            width: 50%;
        }
        
        #commentButton {
            z-index: 3;
            margin: 15px;
            display: inline-block;
            margin: 5px;
            margin-bottom: 0;
            padding: 10px 50px;
            background: #333;
            color: #fff;
            border: 1px solid rgb(154, 152, 152)y;
            border-radius: 5px;
            cursor: pointer;
        }
        #commentPopup {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #333;
            color: #fff;
            border-radius: 10px;
            border-color: rgb(154, 152, 152);
            border-style: solid;
            border-width: 1px; /* Added to make the border thinner */
            padding: 15px;
            z-index: 5;
            width: 35%;
        }
        #commentPopup h2 {
            text-align: center;
            margin: 0;
            margin-bottom: 20px;
        }
        #commentForm {
            text-align: left;
            padding: 10px;
        }
        #commentText {
            width: 100%;
        }
        #commentForm input[type="submit"] {
            margin: 10px auto;
            display: inline-block;
            margin: 10px;
            margin-bottom: 0;
            padding: 10px 50px;
            background: #333;
            color: #fff;
            border: 1px solid rgb(154, 152, 152)y;
            border-radius: 5px;
            cursor: pointer;
        }
        .commentList {
            position: fixed;
            color: yellow;
            bottom: 0;
            left: 0;
            z-index: 3;
            overflow: hidden;
            white-space: nowrap;
            animation: scroll 22s linear infinite;
        }
        .commentList p {
            display: inline;
            
        }
        @keyframes scroll {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
        .uid {
            color:#ffffff;
            margin: 0;
            margin-left: 8px;
            margin-right: 2px;
        }
        .alias {
            display: inline-block;
            margin-bottom: 10px;
        }
        .alias input {
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <div class="menu">
        <div id="aboutButton">
            <button onclick="openPopup('This website is the map and bedrock of a transmedia art series by Yelena Boni. Constructing a weekly narrative to fashion wondering around each piece of work, so to bind nexuses of a growing lore into something that dismantles shape and form. \n\n Links are the primary material of this series. Therefore, I ask of you to click things in these website as much as your heart desires. Follow the paths and hang on tight with the loading times. \n\n Current Narrative: s͎t͎o͎r͎i͎e͎s͎ ͎i͎m͎ ͎t͎o͎l͎d͎ \n Patch: 0.5.2.7 \n beta build','https://linktr.ee/estilara', 'aboutButton')">About</button>
        </div>
        <div id="newsButton">
            <button onclick="openPopup('No news yet', 'https://www.example.com', 'newsButton')">News</button>
        </div>
    </div>
    <div onclick="openPopup('suddꍟnly insi𝒹e ᵃˢ ᵗᵒˡᵈ ᵇʸ a friend of mine', 'https://zora.co/collect/zora:0x4e4ef5d12ca20ec2e15f04e8ca5299b315ea1821/1')">
        <img src="Images/eventoprotocolado_ITEM.gif" class="protocolo" id="item" alt="Event Protocolado Item">
    </div>
    <div onclick="openPopup('ɳowherҽ Ⴆυƚ ҽverყwherҽ ᵃˢ ᵗᵒˡᵈ ᵇʸ one of them', 'https://zora.co/collect/zora:0x4e4ef5d12ca20ec2e15f04e8ca5299b315ea1821/3')">
        <img src="Images/gravadores_item.gif" class="gravadores" id="item" alt="Event Protocolado Item">
    </div>
    <div onclick="openPopup('ꉓalleꀸ upoภ ᵃˢ ᵗᵒˡᵈ ᵇʸ a sweater', 'https://zora.co/collect/zora:0x4e4ef5d12ca20ec2e15f04e8ca5299b315ea1821/4')">
        <img src="Images/passage_item.gif" class="passagem" id="item" alt="Event Protocolado Item">
    </div>
    <div onclick="openPopup('Arrows of my Ways', 'https://www.youtube.com/live/6Bs5tO-lUeE?si=GmeekAc7v-e6mNO4')">
        <img src="Images/blackcircle.gif" class="blackcircle" id="item" alt="Event Protocolado Item">
    </div>
    <div onclick="openPopup('AgainOnceMore', 'https://www.youtube.com/live/b_LwwKTwjGc?si=I5irXyCsSZFV7UTd')">
        <img src="Images/blackcircle.gif" class="blackcircle2" id="item" alt="Event Protocolado Item">
    </div>
    <div onclick="openPopup('In the meantime, follow a cardboard apprentice and their magik', 'https://www.tiktok.com/@perfo_archive')">
        <img src="Images/box_item.gif" class="box" id="item" alt="Event Protocolado Item">
    </div>
    <div onclick="openPopup('Current state of the narrative you are now reading', 'http://estilara.net')">
        <img src="Images/box_item.gif" class="box2" id="item" alt="Event Protocolado Item">
    </div>
    <div>
        <img src="Images/citeview1.png" class="foreground" alt="City View 1">
    </div>
    <div>
        <img src="Images/cityview2.png" class="middleground" alt="City View 2">
    </div>
    <div>
        <img src="Images/thecity.jpg" class="background" alt="City View 2">
    </div>
    <div>
        <img src="Images/city_quote.png" class="cityQuote">
    </div>
    <div>
        <img src="Images/whatsup.png" class="footer">
    </div>
    <div class="menu2">
        <button id="commentButton" onclick="openCommentPopup()">Comment</button>
    </div>
    <div id="popup">
        <div class="popupTitle">.pdf</div>
        <div id="popupText">
            <p></p>
        </div>
        <button onclick="closePopup()" id="exit">x</button>
        <div id="buttonContainer">
            <button id="readButton" onclick="window.location.href='https://www.example.com'">Enter Ꮛ𝓿𝓮ɳt</button>
        </div>
    </div>

    <div id='commentPopup'>
        <button onclick='closePopup()' id='exit'>x</button>
        <?php
        echo "<form  method='POST' action='".setComments($conn)."' id='commentForm'>
                <div class='alias'>Alias:<input type='text' name='uid' value='' required='required'></div>
                <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                <textarea name='message' id='commentText' rows='1' cols='50' maxlength='50' placeholder='Tell us...'></textarea>
                <br>
                <input name='commentSubmit' type='submit' value='Submit'>
            </form>";
        ?>
    </div>

    <div class="commentList">
        <?php getComments($conn); ?>
    </div>
    
    <script>
        function openPopup(text, url, source) {
            document.getElementById('popupText').innerHTML = text.replace(/\n/g, '<br>').replace(/\n\n/g, '</p><p>');
            document.getElementById('popup').style.display = 'block';
            document.getElementById('readButton').onclick = function() {window.open(url, '_blank');};
            if (source === 'aboutButton') {
                document.getElementById('readButton').innerText = 'Linktree';
                document.querySelector('.popupTitle').innerText = 'Intel';
                document.querySelector('.popupTitle').style.background = '#767575';
                document.querySelector('.popupTitle').style.borderColor = '#767575';
                document.getElementById('popup').style.width = '50%';

            } else if (source === 'newsButton') {
                document.getElementById('readButton').style.display = 'none';
                document.querySelector('.popupTitle').innerText = 'Intel';
                document.querySelector('.popupTitle').style.background = '#767575';
                document.querySelector('.popupTitle').style.borderColor = '#767575';
            } else {
                document.getElementById('readButton').innerText = 'Enter Ꮛ𝓿𝓮ɳt';
                document.getElementById('readButton').style.display = 'inline-block';
            }
        }
        function closePopup() {
            document.getElementById('popup').style.display = 'none';
            document.getElementById('commentPopup').style.display = 'none';
        }
        function openCommentPopup() {
            document.getElementById('commentPopup').style.display = 'block';
        }
        
        document.querySelectorAll('.blackcircle, .blackcircle2, .box').forEach(function(element) {
            element.onclick = function() {
                document.querySelector('.popupTitle').innerText = '.mp4';
                document.querySelector('.popupTitle').style.background = 'rgb(66, 106, 206)';
                document.querySelector('.popupTitle').style.borderColor = 'rgb(66, 106, 206)';
            }
        });
        document.querySelectorAll('.protocolo, .gravadores, .passagem').forEach(function(element) {
            element.onclick = function() {
                document.querySelector('.popupTitle').innerText = '.pdf';
            document.querySelector('.popupTitle').style.background = '#da1111';
            document.querySelector('.popupTitle').style.borderColor = '#da1111';
            document.getElementById('popup').style.display = 'none';
            }
        });
        document.querySelector('.box2').onclick = function() {
            document.querySelector('.popupTitle').innerText = '.html';
            document.querySelector('.popupTitle').style.background = '#33b752';
            document.querySelector('.popupTitle').style.borderColor = '#33b752';
        }
    
        document.querySelector('.protocolo').onmouseover = function() {
            document.querySelector('.cityQuote').src = 'Images/protocolo_quote.png';
        }
        document.querySelector('.protocolo').onmouseout = function() {
            document.querySelector('.cityQuote').src = 'Images/city_quote.png';
        }
        document.querySelector('.gravadores').onmouseover = function() {
            document.querySelector('.cityQuote').src = 'Images/gravadores_quote.png';
        }
        document.querySelector('.gravadores').onmouseout = function() {
            document.querySelector('.cityQuote').src = 'Images/city_quote.png';
        }
        document.querySelector('.passagem').onmouseover = function() {
            document.querySelector('.cityQuote').src = 'Images/passage_quote.png';
        }
        document.querySelector('.passagem').onmouseout = function() {
            document.querySelector('.cityQuote').src = 'Images/city_quote.png';
        }
        document.querySelectorAll('.box, .box2').forEach(function(element) {
            element.onmouseover = function() {
                if (window.innerWidth <= 768 || window.orientation === 90 || window.orientation === -90) {
                    document.querySelector('.cityQuote').src = 'Images/box_quote.png';
                    document.querySelector('.cityQuote').style.width = '30%';
                } else {
                    document.querySelector('.cityQuote').src = 'Images/box_quote.png';
                }
            }
            element.onmouseout = function() {
                if (window.innerWidth <= 768 || window.orientation === 90 || window.orientation === -90) {
                    document.querySelector('.cityQuote').src = 'Images/city_quote.png';
                    document.querySelector('.cityQuote').style.width = '30%';
                } else {
                    document.querySelector('.cityQuote').src = 'Images/city_quote.png';
                }
            }
        });
        
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href)
        }
        </script>
     </body>  
     </body>  
</html>



