<?php 
    
    session_start();
    // include '../PHP/fetchdata.php';
    include '../PHP/fetchAddressDetails.php';
    include '../PHP/fetchpersonaldetails.php';

    if(isset($_SESSION['user_profile_token']) && isset($_GET['user_profile_token'])){
        $var_one = trim($_GET['user_profile_token']);
        $var_two = trim($_SESSION['user_profile_token']);
        if($var_one == $var_two){
            
        }
        else{
            header("Location: ../HTML/errorpage.html");
            exit();
        }
    }
    else{
        header("Location: ../HTML/errorpage.html");
        exit();
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- For loading component -->
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <!-- My external css -->
    <link rel="stylesheet" href="/Test Guru/CSS/wholeprofile.css"> 
    <!-- navbar css -->
    <link rel="stylesheet" href="/Test Guru/HTML/navbar/navbar.css">
    <!-- modal css -->
    <link rel="stylesheet" href="/Test Guru/CSS/editmodal.css">
    
    

</head>
<body>
    <div id="load-navbar"></div>
    <div id="load-modal"></div>
    <div class="parent-profile-detail-div">
       <div class="user-and-image">
            <div class="user-image">
                <img src="../Images/user-image.jpg" alt="">
            </div>
            <div class="user-name">
            <?php echo $name;?>
            </div>
       </div>
       <div class="navigation-bar-for-profile">
        <!-- full page tabs -->
            <button class="tablink" onclick="openPage('Profile', this, 'white')" id="defaultOpen">Profile</button>
            <button class="tablink" onclick="openPage('Batches', this, 'white')" >Batches</button>
            <button class="tablink" onclick="openPage('Courses', this, 'white')">Courses</button>
            <button class="tablink" onclick="openPage('Performance', this, 'white')">Performance</button>

            <button class="tablink" onclick="openPage('Payments', this, 'white')" >Payments</button>
            <button class="tablink" onclick="openPage('Assignments', this, 'white')" >Assignemnts</button>
            

            <div id="Profile" class="tabcontent">
                
                <div class="big-parent" id="basic-information-user">
                    <div class="basic-information">
                        <div class="basic-information-content">
                            <span class="number">1</span>
                            Basic Information
                            <span class="edit-form" >Edit</span>
                        </div>
                        <div class="basic-information-form">
                                <div class="field-wrapper">
                                    <div class="backend-data">Name</div>
                                    <div class="backend-data"><?php 
                                        echo $name;
                                    ?></div>
                                </div>

                                
                                <div class="field-wrapper">
                                    <div class="backend-data">Phone Number</div>
                                    <div class="backend-data"><?php 
                                        echo $mobile_number;
                                    ?></div>
                                </div>

                                <div class="field-wrapper">
                                    <div class="backend-data">Email</div>
                                    <div class="backend-data"><?php 
                                        echo $email
                                    ?></div>
                                </div>

                                <div class="field-wrapper">
                                    <div class="backend-data">date of joining</div>
                                    <div class="backend-data"><?php 
                                        echo $date_of_joining;
                                    ?></div>
                                </div>

                                <div class="field-wrapper">
                                    <div class="backend-data">Roll no.</div>
                                    <div class="backend-data"><?php 
                                        echo $roll_number
                                    ?></div>
                                </div>

                                
                        </div>
                    </div>
                </div>

                
                <div class="big-parent" id="personal-details-user">
                    <div class="basic-information">
                        <div class="basic-information-content">
                            <span class="number">2</span>
                            Personal Details
                            <span class="edit-form" id="basic-information-edit" onclick="openEditModal('Personal Details')">Edit</span>
                        </div>
                        <div class="basic-information-form">
                                <div class="field-wrapper">
                                    <div class="backend-data">Date of Birth</div>
                                    <div class="backend-data">
                                    <?php 
                                        echo ($dob == null)?"-----":$dob;
                                    ?>
                                    </div>
                                </div>

                                
                                <div class="field-wrapper">
                                    <div class="backend-data">Gender</div>
                                    <div class="backend-data">
                                    <?php 
                                       echo ($gender == null)?"-----":$gender;
                                    ?>
                                    </div>
                                </div>

                                <div class="field-wrapper">
                                    <div class="backend-data">Nationality</div>
                                    <div class="backend-data">
                                    <?php 
                                        echo ($nationality == null)?"-----":$nationality;
                                    ?>
                                    </div>
                                </div>

                                <div class="field-wrapper">
                                    <div class="backend-data">Blood Group</div>
                                    <div class="backend-data">
                                    <?php 
                                        echo ($blood_group == null)?"-----":$blood_group;
                                    ?>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>

                
                <div class="big-parent" id="address-of-user">
                    <div class="basic-information">
                        <div class="basic-information-content">
                            <span class="number">3</span>
                            Address
                            <span class="edit-form" onclick="openEditModal('Address Details')">Edit</span>
                        </div>
                        <div class="basic-information-form">
                                <div class="field-wrapper">
                                    <div class="backend-data">Permanent Address</div>
                                    <div class="backend-data">
                                    <?php 
                                        echo ($permanent_address !== null)? ($permanent_address): ("-----");
                                    ?>
                                    </div>
                                </div>

                                
                                <div class="field-wrapper">
                                    <div class="backend-data">Permanent Address Pin Code </div>
                                    <div class="backend-data">
                                    <?php 
                                        echo ($p_a_pincode !== null)? ($p_a_pincode): ("-----");
                                    ?>
                                    </div>
                                </div>

                                <div class="field-wrapper">
                                    <div class="backend-data">Correspondance Address</div>
                                    <div class="backend-data">
                                    <?php 
                                        echo ($correspondance_address !== null)? ($correspondance_address): ("-----");
                                    ?>
                                    </div>
                                </div>

                                <div class="field-wrapper">
                                    <div class="backend-data">Correspondance Address Pin Code</div>
                                    <div class="backend-data">
                                    <?php 
                                        echo ($c_a_pincode !== null)? ($c_a_pincode): ("-----");
                                    ?>
                                    </div>
                                </div>
                                    
                        </div>
                    </div>
                </div>
                
                
            </div>

            <div id="Batches" class="tabcontent">
                <div class="batches-wholeprofile">
                    <img src="../Images/9264822.jpg" alt="">
                </div>  
            </div>

            <div id="Courses" class="tabcontent">
            <div class="batches-wholeprofile">
                    <img src="../Images/9264822.jpg" alt="">
                </div>  
            </div>

            <div id="Performance" class="tabcontent">
            <div class="batches-wholeprofile">
                    <img src="../Images/9264822.jpg" alt="">
                </div>  
            </div>

            <div id="Payments" class="tabcontent">
            <div class="batches-wholeprofile">
                    <img src="../Images/9264822.jpg" alt="">
                </div>  
            </div>

            <div id="Assignments" class="tabcontent">
            <div class="batches-wholeprofile">
                    <img src="../Images/9264822.jpg" alt="">
                </div>  
            </div>
       </div>
    </div>
    <script>
        $(function(){
            $("#load-navbar").load("navbar/navbar.html",function(){
                document.querySelector("#name-on-navbar").innerHTML = "User Details";
            });
        });

        $(function(){
            $("#load-modal").load("editmodal.html", function(){
                document.querySelector("#cross-edit-modal").addEventListener("click", function(){
                    document.querySelector(".edit-open-modal").style.display = "none";
                });
                
            })
        });
    </script>

    <!-- for external script -->
    <script src="/Test Guru/JS/wholeprofile.js"></script>
    <!-- modal js -->
    <script src="/Test Guru/JS/editmodal.js"></script>
</body>
</html>