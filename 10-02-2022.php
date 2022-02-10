
<html>
<head>
    <title>
        css with js
    </title>
<!--    <style>-->
<!--    /*    #in1{*/-->
<!--    /*        border: 1px solid blue;*/-->
<!--    /*        outline: blue 1px solid;*/-->
<!--    /*        background-color: white;*/-->
<!--    /*    }*/-->
<!--    /*</style>*/-->
</head>
<body>
<p id="p">

</p>
<textarea id="texta" name="a">


</textarea>
<button id="btn" onmouseover="over()" onmouseout="out()" >button</button>
<form action="#">
    <input type="text" id="in1" placeholder="enter your name"  /> <br> <br>

    <input type="email" id="in2" placeholder="enter your email" onkeydown="keypress()" onkeyup="keyup()"/> <br> <br>

    <input type="submit" value="submit" id="btn2"  />
</form>


<script>
    var a=document.getElementById('p').textContent='hello world';
   document.getElementById('texta').style.width='40vw';
   document.getElementById('texta').style.height='40vh';
   document.getElementById('texta').style.fontStyle='italic';
   // document.getElementById('texta').style.margin='15%';
   document.getElementById('texta').style.color='red';
   document.getElementById('texta').style.backgroundColor='yellow';
  function over(){
      var b=document.getElementById('btn').style.color='red';
  }
    function out(){
        var c=document.getElementById('btn').style.color='blue';
    }
  // function click(){
  //     var q=document.getElementById('btn').style.color='yellow';
  // }
  //   function focus(){
  //       var d=document.getElementById('in1').style.backgroundColor="yellow";
  //   }
    document.getElementById("in1").onfocus=function() {
        var d=document.getElementById('in1').style.backgroundColor="yellow";
    };
    document.getElementById("in1").onblur=function() {
        var e=document.getElementById('in1').style.backgroundColor="blue";
    };
    document.getElementById('btn2').onload=function() {
        var k=document.getElementById('btn2').style.backgroundColor='blue';
    }


    function keypress(){
        var f=document.getElementById('in2').style.color='blue';
    }
    function keyup(){
        var g=document.getElementById('in2').style.color='red';
    }



    // var a=document.getElementById('texta').style.height='60vw';

    // var texta=document.getElementById('texta').style= 'width: 150px; height: 40px; color: blue';
</script>

</body>

</html>
