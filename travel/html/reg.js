function registration()
	{

		var fname= document.getElementById("t1").value;
		var lname= document.getElementById("t2").value;
		var email= document.getElementById("t3").value;
		var psw= document.getElementById("t4").value;			
	
		
        //email id expression code
		var psw_expression = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;
		var letters = /^[A-Za-z]+$/;
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		if(fname=='')
		{
			alert('Please enter your name');
		}
		else if(!letters.test(fname))
		{
			alert('Name field required only alphabet characters');
		}
		else if(email=='')
		{
			alert('Please enter your user email id');
		}
		else if (!filter.test(email))
		{
			alert('Invalid email');
		}
		else if(lname=='')
		{
			alert('Please enter the user name.');
		}
		else if(!letters.test(lname))
		{
			alert('User name field required only alphabet characters');
		}
		else if(psw=='')
		{
			alert('Please enter Password');
		}
		else if(cpwd=='')
		{
			alert('Enter Confirm Password');
		}
		else if(!psw_expression.test(psw))
		{
			alert ('Upper case, Lower case, Special character and Numeric letter are required in Password filed');
		}
		else if(psw != cpwd)
		{
			alert ('Password not Matched');
		}
		else
		{				                            
               alert('Thank You for Login & You are Redirecting to Campuslife Website');
			   // Redirecting to other page or webste code. 
			   window.location = "login.html"; 
		}
	}
	function clearFunc()
	{
		document.getElementById("t1").value="";
		document.getElementById("t2").value="";
		document.getElementById("t3").value="";
		document.getElementById("t4").value="";
	}