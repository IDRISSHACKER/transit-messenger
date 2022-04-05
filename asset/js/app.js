function _newArrowCheck(innerThis, boundThis) { if (innerThis !== boundThis) { throw new TypeError("Cannot instantiate an arrow function"); } }

var _this = this;

var CHOICE_ACTIVE = "choice-active";

var choices = function choices() {
    var _this2 = this;

    _newArrowCheck(this, _this);

    var allChoices = [].concat(document.querySelectorAll(".choice"));
    allChoices.map(function (choice) {
        _newArrowCheck(this, _this2);

        choice.addEventListener("click", function () {
            var activeChoice = document.querySelector("." + CHOICE_ACTIVE);
            activeChoice.classList.remove(CHOICE_ACTIVE);
            this.classList.add(CHOICE_ACTIVE);
        });
    }.bind(this));
}.bind(this);

choices();