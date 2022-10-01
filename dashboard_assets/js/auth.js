$('#addUser').validate({
    ignore:'ignore',
    errorClass:'invalid',
    validClass:'success',
    rules:{
        name:{
            required:true,
            minlength:2,
            maxlength:50
        },       
        email:{
            required:true,
            email:true,
            remote: {
                url: baseUrl+"/unique_email",
                // url: "/unique_email",
                type: "post",
                data: {
                  email: function() {
                    return $("#email").val();
                  },
                  '_token':$('meta[name="csrf-token"]').attr('content')
                }
            }   
        },
        password:{
          required:true,
     	    minlength:6,
     	    maxlength:100
        },
        role:{
          required:true 
        }
        
        
    },
    messages: {
	    name: {
	  		required:"Please enter your name"
	    },
	   
	    email: {
	      required: "We need your email address to contact you",
	      email: "Your email address must be in the format of name@domain.com",
	      remote:"Email already in use. Try with different email"
	    },
	    password:{
	    	required:"Enter your password"
	    },	    
	    role:{
        required:"Please enter user or vendor?"
      }
	 },
});

$('#login').validate({
  ignore:'ignore',
  errorClass:'invalid',
  validClass:'success',
  rules:{      
      email:{
          required:true,
          email:true,  
      },
      password:{
        required:true,
      },    
  },
  messages: {
    email: {
      required: "Enter your email address",
      email: "Your email address must be in the format of name@domain.com"
      
      
    },
    password:{
      required:"Enter your password"
    },	    
    
 },
});
