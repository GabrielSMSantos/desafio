import connection from "../models/connection.js";

class UserController {

    create(req, res) {
        var data = {
            ...req.body,
            telephones: JSON.stringify(req.body.telephones),
            created_at: new Date(),
            modified_at: new Date()
        }
        
        const sql = "INSERT INTO users SET ?";
        connection.query(sql, data, (error, result) => {
            if (error) {
                return res.status(500).send({"Database Error: ": error});
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
        const sql = `SELECT * FROM users WHERE email="${req.body.email}" AND password="${req.body.password}"`;
        connection.query(sql, (error, result) => {
            if (error) {
                return res.status(500).send({"Database Error: ": error})
            } else if (result.length) {
                return res.status(200).json(result);
            } else {
                return res.status(401).send("Email ou password inválidos!");
            }
        });
    }

    show(req, res) {
        const sql = "SELECT id,email,telephones,created_at,modified_at FROM users WHERE id=?";
        connection.query(sql, req.params.id, (error, result) => {
            if (error) {
                return res.status(500).send({"Database Error: ": error});
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