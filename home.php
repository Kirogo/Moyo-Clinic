<?php
include_once 'header.php';

?>
<!-- Masthead-->
<!-- Projects-->
<!-- Signup-->

<!-- Contact-->
<section class="contact-section bg-black">
  <div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5">
      <div class="container px-4 px-lg-5">
        <!-- Featured Project Row-->
        <!-- Project One Row-->
        <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">

          <form class="form-horizontal" action="symptomsprocessors.php" method="post">

            <div class="col-lg-12 bg-light">
              <div class="chatholder">
              <div class="message">
                <div class="message__text">
                  <p>Hi, I am your Moyo assistant. I will help you diagnose your heart disease. Please add the sign & symptoms below.</p>
                </div>
              </div>
                <div class="response" id="response">

                </div>
                <div class="input-container">
                  <label for="input-field" id='card-title'>Add Signs & Symptoms</label>
                  <input type="text" name="input-field" placeholder="Enter your symptom" id="input-field" />
                </div>
                <button id="add-input-btn" type='button'><i class="fa fa-plus" aria-hidden="true"></i> Add More</button>
                <button type="button" name='getresult' id="submit-btn" class="submit-button">GET RESULTS <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
              </div>
            </div>
          </form>
        </div>
        <!-- Project Two Row-->

      </div>
    </div>
  </div>
</section>

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
<script>
  const addInputBtn = document.getElementById("add-input-btn");
  const inputContainer = document.querySelector(".input-container");
  const inputnum = document.querySelector(".input-num");
  let inputCounter = 1;

  addInputBtn.addEventListener("click", function() {
    const newInput = document.createElement("input");
    newInput.setAttribute("type", "text");
    newInput.setAttribute("name", "input-field-" + inputCounter);
    newInput.setAttribute("class", "new-input");
    newInput.setAttribute("placeholder", "Enter your symptom");
    inputContainer.appendChild(newInput);
    inputCounter++;
  });

  // Send input data to PHP file
  const submitBtn = document.getElementById("submit-btn");
  submitBtn.addEventListener("click", function() {
    const response = document.getElementById("response");
    const inputs = document.querySelectorAll(".new-input");
    let inputData = "";

    inputs.forEach(function(input) {
      inputData += input.value + " ";
    });

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "symptomsprocessors.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // console.log(xhr.responseText);
        response.innerHTML = xhr.responseText;
      }
    };
    xhr.send("inputData=" + inputData);
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>