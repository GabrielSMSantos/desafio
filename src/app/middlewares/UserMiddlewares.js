const validateEmptyInputSignUp = function(req, res, next) {
    var emptyInputs = [];
    var errorMessage = "";

    if (!req.body.name) {
        emptyInputs.push("name");
    }

    if (!req.body.email)  {
        emptyInputs.push("email");
    }

    if (!req.body.password) {
        emptyInputs.push("password");
    }

    if (!req.body.telephones) {
        emptyInputs.push("telephones");
    }

    if (req.body.telephones && (typeof req.body.telephones == "string" || (typeof req.body.telephones == "object" && !req.body.telephones.length) || !req.body.telephones[0].number || !req.body.telephones[0].area_code)) {
        errorMessage = "O campo telephones precisa de pelo menos um number e area_code informados!";
        
    } else if (emptyInputs.length) {
        errorMessage = `Por favor informe ${emptyInputs.length > 1 ? "os campos "+ emptyInputs.slice(0, emptyInputs.length - 1).join(", ") +" e "+ emptyInputs[emptyInputs.length - 1] : "o campo "+ emptyInputs.join("")}!`;

    } else if (req.body.telephones && typeof req.body.telephones == "object" && req.body.telephones.length > 1) {
        req.body.telephones.forEach((telephone) => {
            if (!telephone.number || !telephone.area_code) {
                errorMessage = "Cada telephone precisa dos campos number e area_code informados!";
            }
        });
    }

    if (errorMessage) {
        return res.status(400).send(errorMessage);
    }

    return next();
}

const validateTypeInputSignUp = function(req, res, next) {
    var wrongInputs  = [];
    var errorMessage = "";

    if (typeof req.body.name != "string") {
        wrongInputs.push("name");
    }

    if (typeof req.body.email != "string")  {
        wrongInputs.push("email");
    }

    if (typeof req.body.password != "string") {
        wrongInputs.push("password");
    }

    if (wrongInputs.length) {
        errorMessage = `${wrongInputs.length > 1 ? "Os campos "+ wrongInputs.slice(0, wrongInputs.length - 1).join(", ") +" e "+ wrongInputs[wrongInputs.length - 1] +" devem" : "O campo "+ wrongInputs.join("") +" deve"} ser do tipo string!`;

    } else if (typeof req.body.telephones != "object") {
        errorMessage = `O campo telephones deve ser um array de objeto contendo number e area_code!`;
        
    } else if (typeof req.body.telephones == "object") {
        req.body.telephones.forEach((telephone) => {
            if (typeof telephone.number != "number") {
                errorMessage = `O campo number de telephones deve ser um number!`;

            } else if (typeof telephone.area_code != "number")  {
                errorMessage = `O campo area_code de telephones deve ser um number!`;
            }
        });
    }

    if (errorMessage) {
        return res.status(400).send(errorMessage);
    }

    return next();
}

const validateEmptyInputSignIn = (req, res, next) => {
    if (!req.body.email || !req.body.password) {
        return res.status(400).send("Informe os campos email e password para o login!");
    }

    return next();
}

const validateTypeInputSignIn = (req, res, next) => {
    if (typeof req.body.email != "string" || typeof req.body.password != "string") {
        return res.status(400).send("Os campos email e password devem ser do tipo string!");
    }

    return next();
}

export {
    validateEmptyInputSignUp,
    validateTypeInputSignUp,

    validateEmptyInputSignIn,
    validateTypeInputSignIn
}