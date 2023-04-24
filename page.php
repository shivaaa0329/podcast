<?php 
include 'Includes/dbcon.php';
?>
<?php
     
        
    //reading all row from database
     
    $sql = "SELECT * FROM `podcast_details`";
    $result = $connection->query($sql);
     

    if(!$result){
        die("Invalid query: ".$connection->error);
    }
     
    $i=0;
    //fetching data from database
    while($row = $result->fetch_assoc()){
        $variable[$i]=$row['name'];
        $variable1[$i]=$row['description'];
        $variable2[$i]=$row['type'];
        $variable3[$i]=$row['speaker'];
        $src[$i]=$row['source'];
        $img_src[$i]=$row['img_source'];
        $i=$i+1;
         
    }
     ?>
<htmL>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
    <body>

    <div class="d-flex flex-row">
        <div class="col-2 side-bar d-flex flex-column justify-content p-3">
            <img src="">
            <p>Home</p>
            <p>Cater</p>
        </div>
        <div>
            
            
            <div class="container">
                <div class="p-3 search d-flex flex-row justify-content-start">
                    <div class="input-group ">
                        <input placeholder="Search" >
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </div>
                    
                </div>
       
                <div id="main" class="row p-3">
                    
                </div>
            </div>
        </div>
        
    </div>
    <script type="text/javascript">
        let main=document.getElementById("main");
        let inc=<?php echo"$i"?>;
        let names=<?php echo json_encode($variable); ?>;
        let desc=<?php echo json_encode($variable1); ?>;
        let type=<?php echo json_encode($variable2); ?>;
        let speaker=<?php echo json_encode($variable3); ?>;
        let source=<?php echo json_encode($src); ?>;
        let img_src=<?php echo json_encode($img_src); ?>;
        
        for (let i = 0; i < inc; i++){
            
            
            let card=document.createElement("div");
            
            card.classList.add("card1");
            let top =document.createElement("div");
            top.classList.add("d-flex","flex-row","jusify-content-center");

            let image=document.createElement("img");
            image.setAttribute("src",img_src[i]);
            image.classList.add("photo");
            top.appendChild(image)
            let textdiv=document.createElement("div");
            
            let nametext=document.createElement("p")
            nametext.innerHTML=names[i];
            let desctext=document.createElement("p")
            desctext.innerHTML=desc[i];
            let speakertext=document.createElement("p")
            speakertext.innerHTML=speaker[i];
            
            textdiv.appendChild(nametext);
            textdiv.appendChild(speakertext);
            textdiv.appendChild(desctext);
            top.appendChild(textdiv);
            card.appendChild(top);
            
            
            
           
            
            let playbtn=document.createElement("div");
            
            
            
            btn=document.createElement("button");
            
            btn.innerHTML="play";
            let aud =document.createElement("audio");
            aud.controls='controls';
            aud.src=source[i];
            aud.id="audio-src"+String(i);
            btn.classList.add("play-pause");
            
            btn.onclick=function (){
                
                if(aud.paused) {
                    aud.play();
                    btn.innerHTML="pause";
                }
                else {
                    aud.pause();
                    btn.innerHTML="play";
                }
                
            };
            let mp=document.getElementById("music_player")
            playbtn.appendChild(btn);
            
            textdiv.appendChild(playbtn);
            
            
            main.appendChild(card);
           
        }
        

 

        
        
    







    </script>
    

    </body>
    </html>


