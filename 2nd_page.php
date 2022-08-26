<?php 
$conn=mysqli_Connect('localhost','root','','test_db');
if(!$conn){
    echo "Connection failed".mysqli_connect_error();
}

if(isset($_POST["save"])){ 

    $P=$_REQUEST['petrol'];
    $D=$_REQUEST['diesel'];
    $LPG=$_REQUEST['LPG'];
    $T=$_REQUEST['taxis'];
    $A=$_REQUEST['auto'];
    $B=$_REQUEST['local_bus'];
    $TR=$_REQUEST['train'];
    if(empty($P)){
      $P=0;
    }
    if(empty($D)){
      $D=0;
    }
    if(empty($LPG)){
      $LPG=0;
    }
    if(empty($T)){
      $T=0;
    }
    if(empty($A)){
      $A=0;
    }
    if(empty($B)){
      $B=0;
    }
    if(empty($TR)){
      $TR=0;
    }
    $ANS=0;
    $P_ANS=$P*2.33;
    $D_ANS=$D*2.68;
    $LPG_ANS=$LPG*2.98*14.5;
    $T_ANS=$T/3.26;
    $A_ANS=$A/18.47;
    $TR_ANS=$TR/10;
    $B_ANS=$B/18.68;
    $RESU=$P_ANS+$D_ANS+$T_ANS+$A_ANS+$T_ANS+$LPG_ANS+$TR_ANS+$B_ANS;
    if($RESU<1500){
      $ANS=0;
    }
    else{
      $ANS=$RESU-1500;
    }
 
    
    
    $sql3="SELECT * FROM transport_result";
    if ($result=mysqli_query($conn,$sql3)){
    $rowcount=mysqli_num_rows($result);
    echo $rowcount;
    $sql2="INSERT INTO transport_result (ID,result) VALUES ($rowcount+1,'$ANS')";
    mysqli_free_result($result);
}
  $sql="INSERT INTO transport (ID,P,D,LPG,T,A,B,TR) VALUES ($rowcount+1,'$P','$D','$LPG','$T','$A','$B','$TR')";
  if (mysqli_query($conn,$sql)){
    if(mysqli_query($conn,$sql2)){
      header("Location:result_page.php");
      
}

}
}

mysqli_close($conn);
?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
  background-color: #FBAB7E;
  background-image: linear-gradient(62deg, #20BF55 0%, #01BAEF 100%);

}
.container{
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
}
.heading{
  font-size: 20px;
  font-weight: 500;
  position: relative;
}
.container .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background-image: linear-gradient(62deg, #20BF55 0%, #01BAEF 100%);
}
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input{
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #20BF55;
}
 form .gender-details .gender-title{
  font-size: 20px;
  font-weight: 500;
 }
 form .category{
   display: flex;
   width: 80%;
   margin: 14px 0 ;
   justify-content: space-between;
 }
 form .category label{
   display: flex;
   align-items: center;
   cursor: pointer;
 }
 form .category label .dot{
  height: 18px;
  width: 18px;
  border-radius: 50%;
  margin-right: 10px;
  background: #20BF55;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}
 #dot-1:checked ~ .category label .one,
 #dot-2:checked ~ .category label .two,
 #dot-3:checked ~ .category label .three{
   background: #20BF55;
   border-color: #20BF55;
 }
 form input[type="radio"]{
   display: none;
 }
 form .button{
   height: 45px;
   margin: 35px 0
 }
 .no{
    font-size: 15px;
    font-weight: 500;
    text-align: right;
    position: relative;
}
 form .button input{
   height: 100%;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background-color: #20BF55;
   background-image: linear-gradient(62deg, #20BF55 0%, #01BAEF 100%);

 }
 form .button input:hover{
  /* transform: scale(0.99); */
  background-color: #20BF55;
  background-image: linear-gradient(62deg, #20BF55 0%, #01BAEF 100%);

  }
 @media(max-width: 584px){
 .container{
  max-width: 100%;
}
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
  }
  @media(max-width: 459px){
  .container .content .category{
    flex-direction: column;
  }

}
  </style>
  <head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
 
  <div class="container">
  
    <div class="no">2/2</div>
    <div class="title">Carbon Foot Print Calculator</div>
    
    <div class="heading"><br> Transportation</div>
    <div class="content">
      <form action="#" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Petrol (in litres)</span>
            <input type="text" name ="petrol" placeholder="Petrol Expenses" >
          </div>
          <div class="input-box">
            <span class="details">Diesel (in litres)</span>
            <input type="text" name ="diesel" placeholder="Diesel Expenses" >
          </div>
          <div class="input-box">
            <span class="details">LPG </span>
            <input type="text" name ="LPG" placeholder=" LPG Usage" >
          </div>
          <div class="input-box">
            <span class="details">Taxi (distance in Kms)</span>
            <input type="text" name ="taxis" placeholder="Distance travelled" >
          </div>
          <div class="input-box">
            <span class="details">Local Bus (distance in Kms)</span>
            <input type="text" name ="local_bus" placeholder="Distance travelled" >
          </div>
          <div class="input-box">
            <span class="details">Auto Rickshaw (distance in Kms)</span>
            <input type="text" name ="auto" placeholder="Distance travelled" >
          </div>
          <div class="input-box">
            <span class="details">Train (distance in Kms)</span>
            <input type="text" name ="train" placeholder="Distance travelled" >
          </div>
        </div>
        <div class="button">
          <input type="submit" name="save" value="Save & Submit">
        </div>
      </form>
</div>
    </div>
    </div>
  </div>
</div>
</body>
</html>