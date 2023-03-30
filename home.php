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



          <div class="col-lg-15 bg-light">
            <div class="chatholder" style="width:92%; height:auto">
              <div class="message">
                <div class="message__text">
                  <p></p>
                  <p>Hi, I am your Assistant. I will help you diagnose your heart disease. Please add your sign & symptoms below.</p>
                </div>
              </div>
              <!-- Trial to See if the Code will work-->

              <style>
                .input-container {
                  margin-bottom: 10px;
                }

                .datainput {
                  margin-right: 5px;
                  margin-bottom: 5px;
                }

                #output-field {
                  width: 50%;
                  height: 40px;
                  margin-top: 10px;
                  padding: 10px;
                  border: 1px solid #ccc;
                  border-radius: 4px;
                  font-size: 16px;
                  font-weight: bold;
                }

                .report {
                  max-width: 800px;
                  margin: 0 auto;
                  padding: 30px;
                  border: 1px solid #ccc;
                  border-radius: 5px;
                  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                  font-family: Arial, sans-serif;
                  font-size: 14px;
                }

                .report-header {
                  display: flex;
                  justify-content: space-between;
                  align-items: center;
                  margin-bottom: 20px;
                }

                .report-header h3 {
                  margin: 0;
                  margin-bottom: 5px;
                  font-size: 28px;
                  font-weight: bold;
                  color: #1A5276;
                  text-shadow: 1px 1px 2px #ccc;
                  text-transform: uppercase;
                }

                .report-header h6 {
                  margin: 0;
                  font-size: 12px;
                  color: #555;
                }

                .report-header h5 {
                  margin: 0;
                  margin-bottom: 5px;
                  font-size: 16px;
                  font-weight: bold;
                  color: #1A5276;
                  text-shadow: 1px 1px 2px #ccc;
                  text-transform: uppercase;
                }

                .report-header p {
                  margin: 0;
                  font-size: 12px;
                  color: #555;
                }

                .report-symptoms {
                  margin-bottom: 20px;
                  margin-top: 10px;
                }

                .report-symptoms h5 {
                  margin-top: 10px;
                  font-size: 16px;
                  font-weight: bold;
                  color: #1A5276;
                  text-transform: uppercase;
                }

                .report-symptoms ul {
                  margin: 0;
                  padding: 0;
                  list-style: disc;
                  color: #555;
                }

                .report-symptoms li {
                  margin-bottom: 5px;
                  margin-left: 30px;
                  color: black;
                }

                .report-disease {
                  margin-bottom: 20px;
                }

                .report-disease h5 {
                  margin-top: 0;
                  font-size: 16px;
                  font-weight: bold;
                  color: #1A5276;
                  text-transform: uppercase;
                }

                .report-disease p {
                  margin: 0;
                  font-size: 14px;
                  color: #555;
                }

                .report-footer {
                  display: flex;
                  justify-content: space-between;
                  align-items: center;
                  margin-top: 20px;
                }

                .report-footer p {
                  margin: 0;
                  font-size: 12px;
                  color: #555;
                }

                .report-footer a {
                  font-size: 12px;
                  color: #555;
                }
              </style>

              <div class="input-container">
                <label for="input-field" id="card-title">Add Signs & Symptoms</label>
                <input type="text" id="output-field" style="place-items: center;" readonly />
                <div id="input-fields">
                  <input type="text" name="input-field[]" placeholder="Enter your symptom" class="datainput" />
                </div>
              </div>
              <div style="place-items: center;">
                <button id="add-input-btn" type="button"><i class="fa fa-plus" aria-hidden="true"></i> Add More</button>
                <button type="button" name="getresult" id="submit-btn" class="submit-button">Get Results <i class="fa fa-pencil" aria-hidden="true"></i></button>
              </div>
              <p></p>
              <div id="report"></div>
              <canvas id="myChart"></canvas>

              <script>
                let diseasesData;

                fetch('diag_test.json')
                  .then(response => response.json())
                  .then(data => {
                    diseasesData = data;
                  })
                  .catch(error => console.error(error));

                const addInputBtn = document.getElementById("add-input-btn");
                const inputFields = document.getElementById("input-fields");
                const resultField = document.getElementById("output-field");
                const reportDiv = document.getElementById("report");

                addInputBtn.addEventListener("click", function() {
                  const newInputField = document.createElement("input");
                  newInputField.type = "text";
                  newInputField.name = "input-field[]";
                  newInputField.placeholder = "Enter your symptom";
                  newInputField.classList.add("datainput");

                  inputFields.appendChild(newInputField);
                });

                document.getElementById("submit-btn").addEventListener("click", function() {
                  const inputValues = document.querySelectorAll("input[name='input-field[]']");
                  const symptoms = Array.from(inputValues).map(input => input.value);

                  const MIN_MATCH_THRESHOLD = 2; // set the minimum number of symptoms that must match
                  let maxMatches = 0;
                  let matchedDisease = null;

                  for (let diseaseName in diseasesData) {
                    const symptomsList = diseasesData[diseaseName];
                    let matches = 0;
                    for (let symptom of symptoms) {
                      if (symptomsList.includes(symptom)) {
                        matches++;
                      }
                    }
                    if (matches > maxMatches) {
                      maxMatches = matches;
                      matchedDisease = diseaseName;
                    }
                  }

                  if (maxMatches >= MIN_MATCH_THRESHOLD) {
                    resultField.value = matchedDisease;

                    // Get username from the database
                    const username = ""; // Replace with actual username from the database

                    // Get current date and time
                    const currentDate = new Date();
                    const dateTimeString = currentDate.toLocaleString();

                    // Generate report
                    // Generate report
                    const reportDiv = document.getElementById("report");
                    const htmlString = `
                    <div class="report">
  <div class="report-header">
    <h3><i class="fas fa-stethoscope"></i> PATIENT <span id="user-id"><?php echo $user['usersId']; ?></span>'S MEDICAL REPORT</h3>
    <h6><i class="far fa-calendar-alt"></i> Date: <i><span id="date-time">${dateTimeString}</span></i></h6>
  </div>
  <div class="report-header">
    <h5><i class="fas fa-user"></i> Patient's Name: <i><u><span id="user-name"><?php echo $user['usersName']; ?></span></u></i></h5>
  </div>
  <div class="report-symptoms">
    <h5><i class="fas fa-thermometer-half"></i> Symptoms:</h5>
    <ul>
      <li><span class="symptom">${symptoms.join('</li><li>')}</span></li>
    </ul>
  </div>
  <div class="report-disease">
    <h5><i class="fas fa-heartbeat"></i> Possible Heart Disease: <i><u><span id="matched-disease">${matchedDisease}</span></u></i></h5>
  </div>
  <div class="report-footer">
    <h5><i class="fas fa-info-circle"></i> Important Medical Information based on your outcome:</h5>
    <ul>
      <li><i class=""></i> It's important to maintain a healthy lifestyle by eating a balanced diet, exercising regularly, and avoiding smoking and excessive alcohol consumption.</li>
      <li><i class=""></i> If you experience any symptoms of heart disease, such as chest pain, shortness of breath, or dizziness, seek medical attention immediately.</li>
      <li><i class=""></i> Follow your doctor's recommendations for treatment and medication to manage your heart disease and reduce the risk of complications.</li>
    </ul>
  </div>
</div>
`;

                    reportDiv.innerHTML = htmlString;

                  } else {
                    resultField.value = "No matching disease found";
                  }
                });

                // Get the top 5 most keyed in symptoms
               
              </script>



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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>