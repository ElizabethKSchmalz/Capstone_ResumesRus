document.getElementById('searchButton').addEventListener('click', () => {
  const word = document.getElementById('wordInput').value;
  const resultsDiv = document.getElementById('results');
  searchButton.disabled = true;
  resultsDiv.innerHTML = 'Searching...'; 

  fetch(`https://api.datamuse.com/words?ml=${word}`)
      .then(response => response.json())
      .then(data => {
          // Instead of just joining with commas, create list items
          const synonymsList = data.map(item => `<li>${item.word}</li>`).join('');
          resultsDiv.innerHTML = `<ul>${synonymsList}</ul>`; 

      })
      .catch(error => { 
          resultsDiv.textContent = 'An error occurred, please try again.';
          console.error('Error fetching synonyms:', error) 
      })
      .finally(() => {
        searchButton.disabled = false; 
        wordInput.value = ''; 
    });
});
