import express from "express";
import { Routes } from "./Routes";
const app = express();
const bodyParser = require('body-parser')
const port=8009;
const cors=require('cors');





const app1 = express();
app1.use(cors())
app1.use(bodyParser.urlencoded({ extended: false }))
app1.use(bodyParser.json())
app1.post('/api/userCreate', (req, res) => {
  
    res.json({
        data: req.body
    })
})
app1.listen(port, () => console.log(`Server listening on port ${port}!`))





