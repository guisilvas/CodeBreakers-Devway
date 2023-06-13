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



// let selectedCharacter = null;

// function selectCharacter(characterId) {
//   const characters = document.getElementsByClassName("character");

//   for (let i = 0; i < characters.length; i++) {
//     characters[i].classList.remove("selected");
//   }

//   const selectedCharacterElement = document.querySelector(
//     `.character:nth-child(${characterId})`
//   );
//   selectedCharacterElement.classList.add("selected");
//   selectedCharacter = characterId;

//   const chooseBtn = document.getElementById("chooseBtn");
//   chooseBtn.disabled = false;
// }

// function chooseCharacter() {
//   if (selectedCharacter !== null) {
//     //seleciona o personagem
//     console.log(selectedCharacter);
//   }
// }

// const profile = document.getElementById("img_profile");
//   if (selectedCharacter == "1"){
//     img_profile.src="assets/characters/character1.png";
//   }