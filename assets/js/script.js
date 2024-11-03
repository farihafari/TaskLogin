    $(document).ready(function(){
        $(document).ready(function () {

            // For Name;
        
            $("#user-name").on('keyup', function () {
                let username = $(this).val();
                let nameRE = /^[A-Za-z\s]{3,15}$/;
                if (!nameRE.test(username)) {
                    $(this).css({
                        "border": "1px solid red",
                        "border-radius": "2rem"
                    });
                    $(this).next("small").html("Please Enter Your Full Name!").css({
                        "color": "red",
                        "font-weight": "bold",
                        "margin-bottom": "4vw"
        
                    })
                }
                else {
                    $(this).css({
                        "border": "1px solid #4e34b6",
                        "border-radius": "2rem"
                    })
                    $(this).next("small").html(" ").css({
                        "margin-bottom" : "1rem"
                    });
                }
            });
        
            // For Email;
            $("#user-email").on('keyup', function () {
                let useremail = $(this).val();
                let emailRE = /^[\w]{3,17}[@][a-z]{5,8}[.][a-z]{3}$/;
                if (!emailRE.test(useremail)) {
                    $(this).css({
                        "border": "1px solid red",
                        "border-radius": "2rem"
                    })
                    $(this).next("small").html("Please Enter the Valid Pattern Of your Email!").css({
                        "font-weight": "bold",
                        "color": "red",
                        // "margin-bottom": ".7rem"
                    })
                }
                else {
                    $(this).css({
                        "border": "1px solid #4e34b6",
                        "border-radius": "2rem"
                    })
                    $(this).next("small").html(" ").css({
                        "margin-bottom" : "1rem"
                    });
                }
            })
        
         
        
            //For Password
            $("#user-password").on('keyup', function () {
                let userpassword = $(this).val();
                let passwordRE = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[\d])(?=.*[@$&%#*])[A-Z,a-z,\d,@$&%#*]{8,15}$/;
                // let passwordRE=/^(?=.*[A-Z])(?=.*[a-z])(?=.*[\d])(?=.*[!@#$%&*])[A-Za-z,\d,!@#$%&*]{8,15}$/;
                if (!passwordRE.test(userpassword)) {
                    $(this).css({
                        "border": "1px solid red",
                        "border-radius": "2rem"
                    })
                    $(this).next("small").html("Please Enter the Valid Pattern fo Password ABCabc@1223!").css({
                        "font-weight": "bold",
                        "color": "red",
                        // "margin-bottom": ".7rem"
                    })
                }
                else {
                    $(this).css({
                        "border": "1px solid #4e34b6",
                        "border-radius": "2rem"
                    })
                    $(this).next("small").html(" ").css({
                        "margin-bottom" : "1rem"
                    });
                }
            });
        
            // For EmptyInput
            function emptyinput(id) {
                if ($(id).val() == "") {
                    $(id).css({
                        "border": "1px solid red",
                        "border-radius": "2rem"
                    })
                    $(id).next("small").html("Please fill Out this Field!").css({
                        "font-weight": "bold",
                        "color": "red",
                        // "margin-bottom": ".7rem"
                        "margin-bootom" : "1rem"
                    })
                }
            };
        
            $("#registeration").on("click", function (e) {
                e.preventDefault();
                let username = $('#user-name').val();
                let nameRE = /^[A-Za-z\s]{3,15}$/;
                let useremail = $('#user-email').val();
                let emailRE = /^[\w]{3,17}[@][a-z]{5,8}[.][a-z]{3}$/;
              
                let password = $('#user-password').val();
                let passwordRE = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[\d])(?=.*[@$&%#*])[A-Z,a-z,\d,@$&%#*]{8,15}$/;
        
                if (!(username && useremail && password)) {
                    emptyinput("#user-name");
                    emptyinput("#user-email")
                    
                    emptyinput("#user-password")
                }
        
                // else if ((!nameRE.test(username)) && (!emailRE.test(useremail)) && (!phoneRE.test(userphone)) && (!passwordRE.test(password)) && (userconfirmpass != password)) {
                //     alert("Invalid Data Please follow the Valid Pattern!") "The code which our teacher writed in the class"
                // }
        
                else if (!((nameRE.test(username)) && (emailRE.test(useremail)) && (passwordRE.test(password)))) {
                    alert("Invalid Data Please follow the Valid Pattern!")
                }else if(username && useremail && password){
                    $.ajax({
                        url:"ajax/register.php",
                        type:"post",
                        data:$("#registration-form").serialize(),
                        success:function(data){
                            $(".registeration-result").html(data);
                        }
                    })
                }
               
        
            });
        
        })
    })