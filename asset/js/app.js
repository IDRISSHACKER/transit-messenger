const CHOICE_ACTIVE = "choice-active";

const choices = () => {

    var allChoices = [...document.querySelectorAll(".choice")];
    allChoices.map(function (choice) {
        choice.addEventListener("click", function () {
            var activeChoice = document.querySelector("." + CHOICE_ACTIVE);
            activeChoice.classList.remove(CHOICE_ACTIVE);
            this.classList.add(CHOICE_ACTIVE);
        });
    });
};

const alert = () => {
    const alertFlag = document.querySelector(".alert");

    if (alertFlag !== null) {

        setTimeout(() => {
            alertFlag.remove();
        }, 9000)

    }
}

alert();
choices();