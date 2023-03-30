# Moyo-Clinic

## Description

This is a website for a clinic that offers services such as:

-   Dental care

-   Vision care

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
              </script>