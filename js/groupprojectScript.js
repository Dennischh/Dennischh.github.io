function StyleChangeEye(button){
  const btn = button;
  if(button.classList.contains("glyphicon-eye-close")){ // open eye
    button.classList.remove("glyphicon-eye-close");    
    button.classList.add("glyphicon-eye-open");
    str = 'openEye';
  }
  else { // close eye
    button.classList.remove("glyphicon-eye-open");
	  button.classList.add("glyphicon-eye-close");
    str = 'closeEye';
  }
  const getName = btn.name;
  const xhttp = new XMLHttpRequest();
  xhttp.open("GET", "functions.php?act="+str+"&n="+getName);
  xhttp.send();

};

function StyleChangeHeart(button){
  const btn = button;
  if(button.classList.contains("glyphicon-heart-empty")){ // fill heart
    button.classList.remove("glyphicon-heart-empty");    
    button.classList.add("glyphicon-heart");
    str = 'fillHeart';
  }
  else { // empty heart
    button.classList.remove("glyphicon-heart");
	  button.classList.add("glyphicon-heart-empty");
    str = 'emptyHeart';
  }
  const getName = btn.name;
  const xhttp = new XMLHttpRequest();
  xhttp.open("GET", "functions.php?act="+str+"&n="+getName);
  xhttp.send();

};