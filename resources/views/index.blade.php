<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bana and Bana Architects</title>
</head>
<body>
    <h5>CLIENT/PROSPECT/VISITOR PAGE</h5>
    <div class="links">
        <a href="#" onclick="botmanChatWidget.open()">Open BnBot</a>
        <a href="#" onclick="botmanChatWidget.close()">Close BnBot</a>
        <a href="{{url('/project')}}">projects</a>
    </div>
<body>
</html>

{{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"> --}}
<script>
    var botmanWidget = {
        frameEndpoint: '/botman/chat',
        dateTimeFormat: 'm/d/yy HH:MM',
        title:'BnBot 🤖',
        introMessage: 'Hi, I am the official chat bot of Bana and Bana Architects!✋',
        placeholderText:'Type something here...',
        // mainColor:'#408590',
        // bubbleBackground:'',
        // bubbleAvatarUrl: '/assets/images/kay0.png',
        // aboutLink:'https://botman.io',
        aboutText: '©️ Bana and Bana Architects 2022',
        displayMessageTime:'true',
        // desktopWidth:'370',
        // mobileHeight:'100%',
        // mobileWidth:'300',
        // videoHeight:'160',
    };

    // SEND ATTACHMENT IN FORM
    // var form = new FormData();
    // form.append("driver", "web");
    // form.append("attachment", "file");
    // form.append("file", "");

    // var settings = {
    // "url": "http://127.0.0.1:8000/",
    // "method": "POST",
    // "timeout": 0,
    // "processData": false,
    // "mimeType": "multipart/form-data",
    // "contentType": false,
    // "data": form
    // };

    // $.ajax(settings).done(function (response) {
    // console.log(response);
    // });

    // TYPING ANIMATION
    // setInterval(function () {
    //     var msg = document.querySelector('ol.chat li:last-child');
    //     if(msg) {
    //         if(msg.className  === 'visitor') {

    //             var node_li = document.createElement('li');
    //             node_li.className = 'indicator';

    //             var node_div = document.createElement('div');
    //             node_div.className = 'loading-dots';

    //             var node_span1 = document.createElement('span');
    //             var node_span2 = document.createElement('span');
    //             var node_span3 = document.createElement('span');
    //             node_span1.className = 'dot';
    //             node_span2.className = 'dot';
    //             node_span3.className = 'dot';

    //             node_div.appendChild(node_span1);
    //             node_div.appendChild(node_span2);
    //             node_div.appendChild(node_span3);
    //             node_li.appendChild(node_div);

    //             document.querySelector('ol.chat').appendChild(node_li);

    //         } else {
    //             var isbot = document.querySelector('ol.chat li:nth-last-child(2)');
    //             if(msg.className  === 'indicator' && isbot.className === 'chatbot') {
    //                 document.querySelector('ol.chat li .loading-dots').parentNode.remove();
    //             }

    //         }

    //     }
    // }, 10);
</script>
<script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>