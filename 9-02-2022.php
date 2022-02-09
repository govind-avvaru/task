<html>
<head>
    <title>form</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            background-color:mintcream;
        }
        .form{
            width: 25vw;
            height: 55vh;
            background-color: white;
            text-align: center;
            padding: 2%;
            box-shadow: 0px 5px 10px black;
            border: solid 2px white;
            border-radius: 10px;
            transform: translate(35vw,16vh);
        }
        .form input{
            width: 20vw;
            height: 5vh;
            border: grey solid 2px;
            border-radius: 7px;
        }
        .form input:focus{
            border: #1e6abc solid 1px;
            outline: 0.2px solid#1e6abc;
        }
        select{
            width: 20vw;
            height: 5vh;
            border: grey solid 2px;
            border-radius: 7px;
        }
        select option{
            border: grey solid 2px;
            border-radius: 7px;
        }
        hr{
            margin-bottom: 11px;
        }
    </style>
</head>
<body>
<form action="index.php" onsubmit="return myfun()" class="form">

    <input type="text"id="name" placeholder="Name"> <br><br>
    <input type="text"id="email" placeholder="Email"><br><br>
    <input type="text"id="phone" placeholder="Phone number"> <br><br>
    <select>
        <option>select state</option>
        <option>ap</option>
        <option>karnataka</option>
        <option>telangana</option>email(
    </select> <br> <br>
    <select>
        <option>select city</option>
        <option>proddatur</option>
        <option>kadapa</option>
        <option>hyderabad</option>
        <option>tirupathi</option>
    </select> <br> <br>
<hr/>
<input type="submit" value="submit" style="background-color: #CD214F; color: white">
</form>
<script type="text/javascript">
    function myfun(){
        var name=document.getElementById('name').value;
        var tel=document.getElementById('phone').value;
        var email=document.getElementById('email').value;
        var x=/^[A-za-z._]{3,}@[A-za-z]{3,}[.]{1}[A-za-z]{2,6}$/;
        var y=/^[0-9]{10}$/;
        

        if(name.length=='')
        {
            alert("enter name");
            return false;
        }
       else if(name.length<5)
        {
            alert("name should be above 5 characters");
            return false;
        }
        else if(email.length=="")
        {
            alert("enter email");
            return false;
        }
        else if(!(x.test(email)))
        {
            alert("enter valid email");
            return false;
        }
        else if(tel.length=='')
        {
            alert("enter phone number");
            return false;
        }
        else if(tel.length<10)
        {
            alert("name should 10 number valid phone number");
            return false;
        }
        else if(!(y.test(tel))){
            alert("don't enter text enter valid phone number");
            return false;
        }
    }

</script>
</body>
</html>
