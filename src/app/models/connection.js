import * as dotenv from 'dotenv'
dotenv.config()

import { createConnection } from "mysql";

var connection = createConnection({
    host: process.env.DB_HOST,
    user: process.env.DB_USER,
    password: process.env.DB_PASSWORD,
    database: process.env.DB_DATABASE
});

connection.connect();

export default connection;