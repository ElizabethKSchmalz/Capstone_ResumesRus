$(document).ready(function() {
  var jobCount = 1;

  $('#addJob').click(function(e) {
      e.preventDefault();
      jobCount++;
      var jobHTML = `
          <div class="job">

              <label for="jobTitle[]">Job Title:</label>
              <input type="text" name="jobTitle[]" id="jobTitle${jobCount}">

              <label for="cName[]">Company Name:</label>
              <input type="text" name="cName[]" id="cName${jobCount}">

              <label for="cAddress[]">Company Address:</label>
              <input type="text" name="cAddress[]" id="cAddress${jobCount}">

              <label for="startDate[]">Start Date:</label>
              <input type="text" name="startDate[]" id="startDate${jobCount}">
              <br>

              <label for="endDate[]">End Date:</label>
              <input type="text" name="endDate[]" id="endDate${jobCount}">

              <label for="letterContent[]">Description of responsibilities or achievements (500 Character Limit):</label>
              <textarea name="letterContent[]" id="letterContent${jobCount}" rows="5" cols="38"></textarea>
              <br><br>
              <br>
              <br>
          </div>
      `;

      $('#workExperience').append(jobHTML);
  });
});
