<!DOCTYPE html>
<html>
    <head>
        <title>Mon projet canvas</title>
        <script src="canvas.js"></script> 
        <script type="text/javascript">
        
        var qrcode = new QRCode("qrcode");
        function makeCode () {      
            var elText = document.getElementById("text");
            echo "bite";
            if (!elText.value) {
                alert("Input a text");
                elText.focus();
                return;
            }
            qrcode.makeCode(elText.value);
        }

        makeCode();

        $("#text").
            on("blur", function () {
                makeCode();
            }).
            on("keydown", function (e) {
                if (e.keyCode == 13) {
                    makeCode();
                }
            });
        
        
        
        window.onload = function()
{
    var canvas = document.getElementById('mon_canvas');
        if(!canvas)
        {
            alert("Impossible de récupérer le canvas");
            return;
        }

    var context = canvas.getContext('2d');
        if(!context)
        {
            alert("Impossible de récupérer le context du canvas");
            return;
        }

var mon_image = new Image();
mon_image.src = "mon_image.png";
context.drawImage(mon_image, 0, 0);


}
        
        
        </script>
    </head>
    <body>
        <canvas id="mon_canvas" width="500" height="500">
            Message pour les navigateurs ne supportant pas encore canvas.
        </canvas>
        <div id="qrcode"></div>
        <script type="text/javascript">
        new QRCode(document.getElementById("qrcode"), "http://jindo.dev.naver.com/collie");
        </script>
    </body>
</html>