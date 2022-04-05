const CHOICE_ACTIVE = "choice-active"

const choices = () => {
    const allChoices = [...document.querySelectorAll(".choice")]
    allChoices.map((choice) => {
        choice.addEventListener("click", function () {
            const activeChoice = document.querySelector("." + CHOICE_ACTIVE)
            activeChoice.classList.remove(CHOICE_ACTIVE)
            this.classList.add(CHOICE_ACTIVE)
        })
    })
}


choices()

