const character = document.getElementsByClassName("character");
function automatc(id){
  for (let i = 0; i < character.length; i++) {
    character[i].classList.remove("selected");
    if(id == i){
      character[i].classList.toggle("selected");
      id_url = i + 1;
      imageUrl = "assets/characters/character"+ id_url + ".png";
      image_icon = "assets/characters/character"+ id_url + "_icon.png";
    }
  }
}

function person(id){
  automatc(id);
}

  
function chooseCharacter(){
  window.location.href = "./profile.php?image=" + encodeURIComponent(imageUrl) + "&image_icon=" + encodeURIComponent(image_icon);
  // window.location.href = "./profile.php?image=" + encodeURIComponent(imageUrl);
}

