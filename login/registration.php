<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>
    <div class="container">
        <div class="login-link">
            <div class="logo">
                <i class='bx bx-pencil' ></i>
                <a href="../index.php"> <span class="text">Cylons University</span></a>
            </div>
            <p class="side-big-heading">Already a member ?</p>
            <p class="primary-bg-text">To keep track on your dashboard please login with your personal info</p>
            <a href="../admin/login.php" class="loginbtn">Login</a>
            <a href="http://localhost/cms/frontend/index.php" class="loginbtn">Back Home</a>
        </div>
        <form id="signupForm" action="code.php" method="POST" class="signup-form-container">
            <p class="big-heading">Create Account</p>
            <div class="progress-bar">
                <div class="stage">
                    <p class="tool-tip">Personal info</p>
                    <p class="stageno stageno-1">1</p>
                </div>
                <div class="stage">
                    <p class="tool-tip">Contact info</p>
                    <p class="stageno stageno-2">2</p>
                </div>
                <div class="stage">
                    <p class="tool-tip">Final Submit</p>
                    <p class="stageno stageno-3">3</p>
                </div>
            </div>
            <div class="signup-form-content">
                <div class="stage1-content">
                    <div class="button-container">
                        <div class="text-fields fname">
                            <label for="fname"><i class='bx bx-user' ></i></label>
                            <input type="text" name="username" id="fname" placeholder="Enter your name" required>
                            <span class="error" id="fnameError"></span>
                        </div>
                        <div class="text-fields lname">
                            <label for="lname"><i class='bx bx-home' ></i></label>
                            <input type="text" name="address" id="lname" placeholder="Enter your address" required>
                            <span class="error" id="addressError"></span>
                        </div>
                    </div>
                    <div class="button-container">
                        <div class="text-fields dob">
                            <input type="date" name="dob" id="dob" required>
                            <span class="error" id="dobError"></span>
                        </div>
                        <div class="gender-selection">
                            <p class="field-heading" >Gender : </p>
                            <select class="text-fields" name="gender" id="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select> 
                            <span class="error" id="genderError"></span>
                        </div>
                    </div>
                  
                    <div class="pagination-btns" >
                        <input type="button" value="Next" class="nextPage stagebtn1b" onclick="stage1to2()">
                    </div>
                </div>
               <div class="stage2-content">
               <div class="button-container">
                <div class="text-fields phone">
                    <label for="phone"><i class='bx bx-phone' ></i></label>
                    <input type="text" name="phone" id="phone" placeholder="Phone number" required>
                    <span class="error" id="phoneError"></span>
                </div>
                <div class="text-fields email">
                    <label for="email"><i class='bx bx-envelope' ></i></label>
                    <input type="email" name="email" id="email" placeholder="Enter your email id" required>
                    <span class="error" id="emailError"></span>
                </div>
               </div>
                <div class="button-container">
                    <div class="text-fields password">
                        <label for="password"><i class='bx bx-lock-alt' ></i></label>
                        <input type="password" name="password" id="password" placeholder="Enter password" required>
                        <span class="error" id="passwordError"></span>
                    </div>
                    <div class="gender-selection" >
                            <p class="field-heading" id="usertypeLabel" required>Usertype: </p>
                            <select class="text-fields" name="usertype" id="usertype" required>
                                <option value="">Select Usertype</option>
                                <option value="Student">Student</option>
                                <option value="Parent">Parent</option>
                                <option value="Teacher">Teacher</option>
                            </select> 
                            <span class="error" id="usertypeError"></span>
                        </div>
                </div>
                <div class="pagination-btns">
                    <input type="button" value="Previous" class="previousPage stagebtn2a" onclick="stage2to1()">
                    <input type="button" value="Next" class="nextPage stagebtn2b" onclick="stage2to3()">
                </div>
               </div>
               <div class="stage3-content">
                <div class="tc-container">
                    <label for="tc" class="tc">
                        <input type="checkbox" name="tc" id="tc" required>
                        By submitting your details, you agree to the <a href="#"> terms and conditions. </a>
                        <span class="error" id="tcError"></span>
                    </label>
                </div>
                <div class="pagination-btns">
                    <input type="button" value="Previous" class="previousPage stagebtn3a" onclick="stage3to2()">
                    <input type="submit" value="Submit" id="register"  name="submit" class="nextPage stagebtn3b">
                </div>
               </div>
            </div>
        </form>
    </div>
</body>
<script>
    let signupContent = document.querySelector(".signup-form-container"),
        stagebtn1b = document.querySelector(".stagebtn1b"),
        stagebtn2a = document.querySelector(".stagebtn2a"),
        stagebtn2b = document.querySelector(".stagebtn2b"),
        stagebtn3a = document.querySelector(".stagebtn3a"),
        stagebtn3b = document.querySelector(".stagebtn3b"),
        signupContent1 = document.querySelector(".stage1-content"),
        signupContent2 = document.querySelector(".stage2-content"),
        signupContent3 = document.querySelector(".stage3-content");
        
        signupContent2.style.display = "none"
        signupContent3.style.display = "none"

        function stage1to2(){
            if (validateStage1()) {
                signupContent1.style.display = "none"
                signupContent3.style.display = "none"
                signupContent2.style.display = "block"
                document.querySelector(".stageno-1").innerText = "✔"
                document.querySelector(".stageno-1").style.backgroundColor = "#52ec61"
                document.querySelector(".stageno-1").style.color = "#fff"
            }
        }

        function stage2to1(){
            signupContent1.style.display = "block"
            signupContent3.style.display = "none"
            signupContent2.style.display = "none"
        }

        function stage2to3(){
            if (validateStage2()) {
                signupContent1.style.display = "none"
                signupContent3.style.display = "block"
                signupContent2.style.display = "none"
                document.querySelector(".stageno-2").innerText = "✔"
                document.querySelector(".stageno-2").style.backgroundColor = "#52ec61"
                document.querySelector(".stageno-2").style.color = "#fff"
            }
        }

        function stage3to2(){
            signupContent1.style.display = "none"
            signupContent3.style.display = "none"
            signupContent2.style.display = "block"
        }

        function validateStage1() {
            let valid = true;
            document.getElementById('fnameError').innerText = '';
            document.getElementById('addressError').innerText = '';
            document.getElementById('dobError').innerText = '';
            document.getElementById('genderError').innerText = '';

            let username = document.getElementById('fname').value;
            let address = document.getElementById('lname').value;
            let dob = document.getElementById('dob').value;
            let gender = document.getElementById('gender').value;

            if (username === '') {
                document.getElementById('fnameError').innerText = 'Name is required';
                valid = false;
            }
            if (address === '') {
                document.getElementById('addressError').innerText = 'Address is required';
                valid = false;
            }
            if (dob === '') {
                document.getElementById('dobError').innerText = 'Date of Birth is required';
                valid = false;
            }
            if (gender === '') {
                document.getElementById('genderError').innerText = 'Gender is required';
                valid = false;
            }
            return valid;
        }

        function validateStage2() {
            let valid = true;
            document.getElementById('phoneError').innerText = '';
            document.getElementById('emailError').innerText = '';
            document.getElementById('passwordError').innerText = '';
            document.getElementById('usertypeError').innerText = '';

            let phone = document.getElementById('phone').value;
            let email = document.getElementById('email').value;
            let password = document.getElementById('password').value;
            let usertype = document.getElementById('usertype').value;

            if (phone === '') {
                document.getElementById('phoneError').innerText = 'Phone number is required';
                valid = false;
            }
            if (email === '') {
                document.getElementById('emailError').innerText = 'Email is required';
                valid = false;
            } else if (!validateEmail(email)) {
                document.getElementById('emailError').innerText = 'Invalid email format';
                valid = false;
            }
            if (password === '') {
                document.getElementById('passwordError').innerText = 'Password is required';
                valid = false;
            }
            if (usertype === '') {
                document.getElementById('usertypeError').innerText = 'Usertype is required';
                valid = false;
            }
            return valid;
        }

        function validateEmail(email) {
            var re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            return re.test(email);
        }

        document.getElementById('signupForm').addEventListener('submit', function(e) {
            let valid = validateStage1() && validateStage2();
            if (!valid) {
                e.preventDefault();
            }
        });
</script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
        $('#signupForm').submit(function(e){
            e.preventDefault();
            var valid = this.checkValidity();
            if(valid){
                var formData = {
                    username: $('#fname').val(),
                    address: $('#lname').val(),
                    dob: $('#dob').val(),
                    gender: $('#gender').val(),
                    phone: $('#phone').val(),
                    email: $('#email').val(),
                    password: $('#password').val(),
                    usertype: $('#usertype').val()
                };
                $.ajax({
                    type: 'POST',
                    url: 'code.php',
                    data: formData,
                    success: function(response){
                        Swal.fire({
                            title: "Successful!",
                            // text: response,
                            icon: "success"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'http://localhost/cms/frontend/index.php';
                            }
                        });
                    },
                    error: function(response){
                        Swal.fire({
                            title: "Errors",
                            text: "There were errors while saving the data.",
                            icon: "error"
                        });
                    }
                });
            }
        });
    });
</script>
</html>
