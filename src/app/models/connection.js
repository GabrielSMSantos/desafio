import { createConnection } from "mysql";

var connection = createConnection({
    host: "127.0.0.1",
    user: "root",
    password: "",
    database: "desafio"
});

connection.connect();

export default connection;