let insertButton = document.querySelector("button[name='insert-button']");
let insertText = document.querySelector("input[name='city-name']");

insertButton.onclick = function () {
  let cityName = insertText.value;
  postRequest(cityName);
  location.reload();
};

function postRequest(message) {
  var xhr = new XMLHttpRequest();
  
  xhr.onreadystatechange = function() {
      if (xhr.readyState == 4) {
          if (xhr.status == '200') {
              alert("Шалость удалась!");            
          }
          else { // 403, 404, 501
              alert( 'Произошла ошибка');
          }
      }
  }
     
  xhr.open('POST', './com/request.php');
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhr.send('city=' + encodeURI(message));
}