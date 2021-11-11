

  function showDiv(element) {
    document.getElementById('hidden1').style.display = element.value == 'DVD' ? 'block' : 'none';
    document.getElementById('hidden2').style.display = element.value == 'BOOK' ? 'block' : 'none';
    document.getElementById('hidden3').style.display = element.value == 'Furniture' ? 'block' : 'none';
  }  
