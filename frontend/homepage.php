<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>K.M rental website homepage</title>
    <!--linking homepage.css file-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/homepage.css">


</head>

<body>
    <!-- general navbar section starts here -->

    <div class="headdiv fixedhead">
        <h1 class="heading"> K.M Rental Application website</h1>
    </div>
    <div class="clearfix"></div>
    <?php
    include("../reputablecodes/navbar.php");
    include("../frontend/login.php");
    ?>
    

    <!--navbar section ends here -->

    <!--About us section starts here -->
    <section class="about-us">
        <div class="kmphoto">
            <div class="photo"><img src="../PHOTOS/kmhostel.jpg" alt="kmhostelpicture"></div>
            <div class="phototext">
                <h1 class="sidephotodescription">
                    More Rental Profits, Less management stress
                </h1>
                <h3 class="sidephotoexplanation">
                    Easy-to-use Property Management System.
                    For landlords and Agents in Kenyatta Market.
                </h3>
                <div class="photologin">
                    <button class='btnphoto' onclick="document.getElementById('login-form').style.display='block'" style="width:auto;">Login</button>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="about-us" id="about-us">
                <h1 class="heading">Best kenyatta Market rental management website you can trust</h1>
                <p> K.M rental application system is one of the leading property management software in Kenyatta Market.
                    The application allows you to do more than manage properties.
                    Whether you manage 50 or 200+units, with this application, you can manage your units on autopilot and maximize your rental profits.
                </p>
                <div class="ourservicediv" id="ourservicediv">
                    <div class="firstdiv">
                        <div class="our-services color1">
                            <h2>Updated tenants records</h2>
                            <p>Digitized and accurate tenant records and
                                account balances that are easy to sort through and maintain.
                                Helps quickly resolve tenant disputes around account balances
                                by keeping track of all tenant invoices and payments.
                            </p>
                        </div>

                        <div class="our-services color2">
                            <h2>Payment Intergration</h2>
                            <p>We integrate with popular payment methods such as Mpesa
                                to allow comrades go cashless.
                                Then,payments are automatically recorded on our system
                                and we alert you on the specific tenant who has paid.
                                Eliminates headaches of tenants lying about payments or losing receipts.
                            </p>
                        </div>
                    </div>
                    <div class="seconddiv">
                        <div class="our-services color3">
                            <h2>Comrade to view and book vacant Houses</h2>
                            <p>
                                Search and viewing vacant posted houses by Comrades wherever they,
                                giving them a chance to select the house of their choice and book it online.
                                Comrade will be able to view the rent per month, location,
                                rental resources such as water availabilty and landlord details.

                            </p>
                        </div>

                        <div class="our-services color4">
                            <h2>Receipt generation</h2>
                            <p>Go paperless with SMS invoices and receipts.
                                You can easily generate invoices and receipts
                                on our platform and send them to tenants through SMS.
                            </p>
                        </div>
                    </div>
                </div>

                
                  <div class="slideimages">
                    <div class="imagecontainer">
                    <p> moriah hostels</p>
                        <img src="../PHOTOS/kmhostel.jpg" alt="image">
                    </div>
                    <div class="imagecontainer">
                    <p>winners hostels</p>
                        <img src="../PHOTOS/kmhostel2.jpg" alt="image">
                    </div>
                    <div class="imagecontainer">
                    <p>Qwetu hostels</p>
                        <img src="../PHOTOS/Qwetu.jpg" alt="image">
                    </div>
                    
                  </div>
                
                
                <div class="testimonialdiv">
                  <h1 class="testimonyheading">Testimonials</h1><br>
                  <h4 class="testimonyheading">Some of our Happy  Landlords, Agents and Kenyatta University
                     comrades who used the application
                    </h4>
                    <br><br>
                  <div class="testimonyformarterdiv" id="testimonyformarterdiv">
                    <div class="testimonydiv">
                        <p>
                        K.M rental website has helped our company manage all 
                        the rentals under our property management unit
                         while we spend less time and get rid of the 
                         mental fatigue that comes with managing a 
                         large number of tenants. They have enabled us 
                         to focus on other duties that our company 
                         undertakes because all tenant and tenant 
                         financial management has now been fully 
                         automated. Any time we need their help, 
                         their support team is always readily available
                          and willing to assist.  
                        </p>
                        <br><br>
                        <i class="fa-solid fa-user">levin Asiko</i>
                       
                        <p></p>
                    </div >
                    <div class="testimonydiv">
                        <p>
                        Right from the outset we had a team looking after us,
                         we met them all and we were confident we were
                          in good hands. They were meticulous in their 
                          handling of our property. They gave us options
                           and advice, said what they would do and more importantly,
                            they did what they said! It is very early days 
                            in our relationship but if this service continues, 
                            and we are confident it will, we will be very happy indeed.  
                        </p>
                        <br><br>
                        <i class="fa-solid fa-user">Dominick Kyengo</i>
                    </div >
                    <div class="testimonydiv">
                        <p>
                        With Bomahut, managing tenants has been made very simple.
                         We no longer have to record payments as they come 
                         in or even invoice tenants every new month. 
                         Rent and utility bills invoicing is automated 
                         as well as the recording of payments. 
                         This has been made possible through 
                         integration of MPESA paybill and all I
                          need to do is log in and I’ll know who has paid, 
                          who has not and by how much. At this point,
                           I can also send payment reminders which are also
                            done in bulk and everybody who has a balance receives a reminder. 
                            All these features have truly made our work easier.
                            <br><br>
                            <i class="fa-solid fa-user">Daniel Ndirangu</i>
                        </p>
                    </div>
                  </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </section>
    <!--about us section ends here -->





    <!--foooter section starts here -->
    <div id="footer">
    <?php include("../reputablecodes/footer.php"); ?>
    </div>
    <!--foooter section ends here -->

</body>

</html>