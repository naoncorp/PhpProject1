<html id ="site-closed">
    <head>
        <title>
            Технический перерыв</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js" style="color: rgb(0, 0, 0);"></script>
        <style type="text/css">
            body{
                overflow: hidden;
               background-image: linear-gradient(bottom, rgb(207,242,255) 18%, rgb(153,224,255) 70%, rgb(127,219,255) 80%);
                background-image: -o-linear-gradient(bottom, rgb(207,242,255) 18%, rgb(153,224,255) 70%, rgb(127,219,255) 80%);
                background-image: -moz-linear-gradient(bottom, rgb(207,242,255) 18%, rgb(153,224,255) 70%, rgb(127,219,255) 80%);
                background-image: -webkit-linear-gradient(bottom, rgb(207,242,255) 18%, rgb(153,224,255) 70%, rgb(127,219,255) 80%);
                background-image: -ms-linear-gradient(bottom, rgb(207,242,255) 18%, rgb(153,224,255) 70%, rgb(127,219,255) 80%);

                background-image: -webkit-gradient(
                        linear,
                        left bottom,
                        left top,
                        color-stop(0.18, rgb(207,242,255)),
                        color-stop(0.7, rgb(153,224,255)),
                        color-stop(0.8, rgb(127,219,255))
                );
                
            }
            
            .pilot {
                width: 220px;
                z-index: 1000;
                display: block;
                top: 15%;
                left: 100%;
                position: absolute;
            }
            
            .clouds {width: 170px; position:absolute;
                     
            }
            .block-text{
                  position:absolute;
                  display: block;
                  top: 50%;
                  left:50%;
                  margin-left: -200px;
                  background-color: rgba(255,255,255,0.4);
                  border: 1px solid white;
                  box-shadow: 0 0 6px black;
                  border-radius: 10px;
                  padding: 20px;
                  width: 400px;
                  text-align: center;
                  font-family: calibri;
            }
            h1{color:orangered; text-align: center; font-family: calibri;}
        </style>
        <script type="text/javascript">
            $(document).ready(function()
              {
                  function getRandomArbitary(min, max)
                  {
                      return Math.ceil(Math.random() * (max - min) + min);
                  }
                  
                  function pilot()
                  {
                      $('.pilot').animate({"left": "50%"},1000)
                      .animate({marginLeft: "-110px"},600);
                      
                  }
                  
                  function pilotirovanie() {
                      var tb = getRandomArbitary(-20,20)+'px';
                      $('.pilot').animate({marginLeft: "-160px", "margin-top": tb}, 1000)
                      .animate({marginLeft: "-110px", "margin-top": tb*(-1)},2000);
                      setTimeout(pilotirovanie, 1600);
                  }
                  setTimeout(pilot, 0);
                  setTimeout(pilotirovanie, 1600);
                  function cloud(i)
                  {
                      var k = getRandomArbitary(0,17);
                      var top = getRandomArbitary(10,100)+'%';
                      var widthc = getRandomArbitary(80,190);
                      var width = widthc+'px';
                      var track = 30000-(widthc*100);
                      //$('body').append($('<img style="width: 170px; position:absolute; margin-left:-190px;" class="clouds' + k + '" src="/inc/images/cloud.png" />'));
                      $('.clouds'+k).animate({"top": top},0).animate({"width": width},0).animate({"left": "100%",marginLeft: "190px"},track).animate({"left": "0px",marginLeft:"-190px"},0);
                      setTimeout(cloud(3), 0);
                  }
                  //setTimeout(function() {cloud;}, 1000);
                  //setTimeout(cloud(2), 3000);
                  
                  setTimeout(cloud(3), getRandomArbitary(200,7000));
                  setTimeout(cloud(3), getRandomArbitary(200,7000));
                  setTimeout(cloud(3), getRandomArbitary(200,7000));
                  setTimeout(cloud(3), getRandomArbitary(200,7000));
                  setTimeout(cloud(3), getRandomArbitary(200,7000));
                  setTimeout(cloud(3), getRandomArbitary(200,7000));
                  setTimeout(cloud(3), getRandomArbitary(200,7000));
                  setTimeout(cloud(3), getRandomArbitary(200,7000));
                  setTimeout(cloud(3), getRandomArbitary(200,7000));
                  setTimeout(cloud(3), getRandomArbitary(200,7000));
                  setTimeout(cloud(3), getRandomArbitary(200,7000));
                  setTimeout(cloud(3), getRandomArbitary(200,7000));
                  setTimeout(cloud(3), getRandomArbitary(200,7000));
                  setTimeout(cloud(3), getRandomArbitary(200,7000));
                  setTimeout(cloud(3), getRandomArbitary(200,7000));
                  setTimeout(cloud(3), getRandomArbitary(200,7000));
                  setTimeout(cloud(3), getRandomArbitary(200,7000));
                  
                  
              }  
            );
        </script>
    </head>
    <body>
        <img class="pilot" src="/inc/images/transp_logo.png" />
        <img style="width: 170px; position:absolute; margin-left: -30%; " class="clouds1" src="/inc/images/cloud.png" />
        <img style="width: 170px; position:absolute; margin-left: -30%;" class="clouds2" src="/inc/images/cloud.png" />
        <img style="width: 170px; position:absolute; margin-left: -30%;" class="clouds3" src="/inc/images/cloud.png" />
        <img style="width: 170px; position:absolute; margin-left: -30%;" class="clouds4" src="/inc/images/cloud.png" />
        <img style="width: 170px; position:absolute; margin-left: -30%;" class="clouds5" src="/inc/images/cloud.png" />
        <img style="width: 170px; position:absolute; margin-left: -30%;" class="clouds6" src="/inc/images/cloud.png" />
        <img style="width: 170px; position:absolute; margin-left: -30%;" class="clouds7" src="/inc/images/cloud.png" />
        <img style="width: 170px; position:absolute; margin-left: -30%;" class="clouds8" src="/inc/images/cloud.png" />
        <img style="width: 170px; position:absolute; margin-left: -30%;" class="clouds9" src="/inc/images/cloud.png" />
        <img style="width: 170px; position:absolute; margin-left: -30%;" class="clouds10" src="/inc/images/cloud.png" />
        <img style="width: 170px; position:absolute; margin-left: -30%;" class="clouds11" src="/inc/images/cloud.png" />
        <img style="width: 170px; position:absolute; margin-left: -30%;" class="clouds12" src="/inc/images/cloud.png" />
        <img style="width: 170px; position:absolute; margin-left: -30%;" class="clouds12" src="/inc/images/cloud.png" />
        <img style="width: 170px; position:absolute; margin-left: -30%;" class="clouds12" src="/inc/images/cloud.png" />
        <img style="width: 170px; position:absolute; margin-left: -30%;" class="clouds12" src="/inc/images/cloud.png" />
        <img style="width: 170px; position:absolute; margin-left: -30%;" class="clouds12" src="/inc/images/cloud.png" />
        <img style="width: 170px; position:absolute; margin-left: -30%;" class="clouds12" src="/inc/images/cloud.png" />
        <div class="block-text">
            <h1>Технический перерыв</h1>
            <p>Привет! Я улетел на тех. осмотр. Приходи ко мне попозже!</p>
            <p style="float:right;"> С уважением, Ваш Пилот!</p>
        </div>
    </body>
        
</html>
