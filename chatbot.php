<?php
include_once 'header.php';

?>
<!-- Masthead-->
<!-- Projects-->
<!-- Signup-->

<!-- Contact-->
<section class="contact-section bg-black" >
  <div class="container px-4 px-lg-5" >
    <div class="row gx-4 gx-lg-5">
      <div class="container px-4 px-lg-5"  >
        <!-- Featured Project Row-->
        <!-- Project One Row-->
        <div class="row gx-0 mb-5 mb-lg-0 justify-content-center" >
          <div class="col-lg-12 bg-light" style= "border-radius: 25px;">
              <div id="screen">
                <div id="header">Moyo Assistant</div>
                <div id="messageDisplaySection">
                </div>
                <!-- messages input field -->
                <div id="userInput">
                  <input type="text" name="messages" id="messages" autocomplete="OFF" placeholder="Type Your Message Here." required>
                  <input type="submit" value="Send" id="send" name="send">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Project Two Row-->

      </div>
    </div>
  </div>
</section>

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <!-- Jquery Start -->
    <script>
        $(document).ready(function(){
            $("#messages").on("keyup",function(){

                if($("#messages").val()){
                    $("#send").css("display","block");
                }else{
                    $("#send").css("display","none");
                }
            });
        });
        // when send button clicked
        $("#send").on("click",function(e){
            $userMessage = $("#messages").val();
            $appendUserMessage = '<div class="chat usersMessages">'+ $userMessage +'</div>';
            $("#messageDisplaySection").append($appendUserMessage);

            // ajax start
            $.ajax({
                url: "aibot.php",
                type: "POST",
                // sending data
                data: {messageValue: $userMessage},
                // response text
                success: function(data){
                    // show response
                    $appendBotResponse = '<div id="messagesContainer"><div class="chat botMessages">'+data+'</div></div>';
                    $("#messageDisplaySection").append($appendBotResponse);
                }
            });
            $("#messages").val("");
            $("#send").css("display","none");
        });
    </script>
<!-- Footer-->
<footer class="footer bg-black small text-center text-white-50">
  <div class="social d-flex justify-content-center">
    <a class="mx-2" href="#!"><i class="fab fa-instagram"></i></a>
    <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
    <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
  </div>
  <div class="container px-4 px-lg-5">Copyright &copy; Kirogo 2022</div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>