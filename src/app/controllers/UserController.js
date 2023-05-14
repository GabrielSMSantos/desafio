import connection from "../models/connection.js";
import { compareSync, hashSync } from "bcrypt";
class UserController {

    async create(req, res) {
        var data = {
            ...req.body,
            password: hashSync(req.body.password, 10),
            telephones: JSON.stringify(req.body.telephones),
            created_at: new Date(),
            modified_at: new Date()
        }
        
        const sql = "INSERT INTO users SET ?";
        connection.query(sql, data, (error, result) => {
            if (error) {
                return res.status(500).send("Ocorreu um erro no banco de dados!");
            } else {
                return res.status(200).json({
                    id: result.insertId,
                    created_at: data.created_at,
                    modified_at: data.modified_at
                });
            }
        });
    }

    signIn(req, res) {
        const sql = `SELECT id,email,password,telephones,created_at,modified_at FROM users WHERE email="${req.body.email}"`;
        connection.query(sql, (error, result) => {
            if (error) {
                return res.status(500).send("Ocorreu um erro no banco de dados!");
            } else if (result.length) {
                var passwordValid = false;
                result.forEach((user) => {
                    var checkPassword = compareSync(req.body.password, user.password);
                    if (checkPassword) {
                        passwordValid = true;
                    }
                });
                
                if (passwordValid) {
                    return res.status(200).send("Logou!!");
                } else {
                    return res.status(401).send("Email ou password inválidos!");
                }
            } else {
                return res.status(401).send("Email ou password inválidos!");
            }
        });
    }

    show(req, res) {
        const sql = "SELECT id,email,telephones,created_at,modified_at FROM users WHERE id=?";
        connection.query(sql, req.params.id, (error, result) => {
            if (error) {
                return res.status(500).send("Ocorreu um erro no banco de dados!");
            } else if (result.length) {
                const resultParsed = {
                    ...result[0],
                    telephones: JSON.parse(result[0].telephones)
                }                

                return res.status(200).json(resultParsed);
            } else {
                return res.status(404).send("Este usuário não existe!");
            }
        });
    }
}

export default new UserController();