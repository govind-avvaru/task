<html>
<head>
    <title>form</title>
</head>
<body>
<form action="#" onsubmit="return myfun()">
    <input type="text"id="name"> <br><br>
    <input type="text"id="email"><br><br>

    <input type="tel"id="phone"> <br><br>
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

<input type="submit" value="submit">
</form>
<script type="text/javascript">
    function myfun(){
      
        var email=document.getElementById('email').value;
        var x=/^[A-za-z._]{3,}@[A-za-z]{3,}[.]{1}[A-za-z]{2,6}$/
     
        if(x.test(email))
        {
            alert("valid");
            return false;
        }
        else
        {
            alert("invalid")
            return false;
        }

    }

</script>
</body>
</html>
