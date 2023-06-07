let selectedCharacter = null;

function selectCharacter(characterId) {
  const characters = document.getElementsByClassName("character");

  for (let i = 0; i < characters.length; i++) {
    characters[i].classList.remove("selected");
  }

  const selectedCharacterElement = document.querySelector(
    `.character:nth-child(${characterId})`
  );
  selectedCharacterElement.classList.add("selected");
  selectedCharacter = characterId;

  const chooseBtn = document.getElementById("chooseBtn");
  chooseBtn.disabled = false;
}

function chooseCharacter() {
  if (selectedCharacter !== null) {
    // Onde seleciona o personagem
    console.log(`Personagem ${selectedCharacter} escolhido!`);
  }
}
