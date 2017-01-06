<html>
	<head>
		<title>New user signup </title>
		<h1 align="center">New User Signup</span></h1>	
	<script language="javascript">
		function check()
		{

 			if(document.form1.lid.value=="")
  			{
    				alert("Plese Enter Login Id");
				document.form1.lid.focus();
				return false;
  			}
 
 			if(document.form1.pass.value=="")
  			{
    				alert("Plese Enter Your Password");
				document.form1.pass.focus();
				return false;
  			} 
  			if(document.form1.cpass.value=="")
  			{
    				alert("Plese Enter Confirm Password");
				document.form1.cpass.focus();
				return false;
  			}
  			if(document.form1.pass.value!=document.form1.cpass.value)
  			{
    				alert("Confirm Password does not matched");
				document.form1.cpass.focus();
				return false;
  			}
  			if(document.form1.name.value=="")
  			{
    				alert("Plese Enter Your Name");
				document.form1.name.focus();
				return false;
  			}
  			if(document.form1.address.value=="")
  			{
    				alert("Plese Enter Address");
				document.form1.address.focus();
				return false;
  			}
  				if(document.form1.city.value=="")
  			{
    				alert("Plese Enter City Name");
				document.form1.city.focus();
				return false;
  			}
  			if(document.form1.phone.value=="")
  			{
    				alert("Plese Enter Contact No");
				document.form1.phone.focus();
				return false;
  			}
  			if(document.form1.email.value=="")
 			{
    				alert("Plese Enter your Email Address");
				document.form1.email.focus();
				return false;
  			}
  		e=document.form1.email.value;
		f1=e.indexOf('@');
		f2=e.indexOf('@',f1+1);
		e1=e.indexOf('.');
		e2=e.indexOf('.',e1+1);
		n=e.length;

			if(!(f1>0 && f2==-1 && e1>0 && e2==-1 && f1!=e1+1 && e1!=f1+1 && f1!=n-1 && e1!=n-1))
			{
				alert("Please Enter valid Email");
				document.form1.email.focus();
				return false;
			}
  			return true;
  		}
  
		</script>
		<link href="admin.css" rel="stylesheet" type="text/css">
`	</head>

	<body background="bg1.jpg">
		
   			
     				<img src="images/connected_multiple_big.jpg" 					width="131" height="155"/>
     				
   			
     				<form name="form1" method="post" action="signupuser.php" onSubmit="return check();">
       					
           					Login Id 
           					<input type="text" name="lid">
         				
           					Password
           					<input type="password" name="pass">
         				
           					Confirm Password
           					<input name="cpass" type="password" id="cpass">
         				
           					Name
           					<input name="name" type="text" id="name">
         				
						Address
           					<textarea name="address" id="address"></textarea>
         				
						City
           					<input name="city" type="text" id="city">
         				
           					Phone
           					<input name="phone" type="text" id="phone">
         				
           					E-mail
           					<input name="email" type="text" id="email">
         				
           					
           					<button type="submit" name="Submit" class="button" value="Signup">Signup</button>
         				</form>
   			 		
 		<p>&nbsp; </p>
	</body>
</html>
