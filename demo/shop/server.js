"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
const express_1 = __importDefault(require("express"));
const app = (0, express_1.default)();
const bodyParser = require('body-parser');
const port = 8009;
const cors = require('cors');
const app1 = (0, express_1.default)();
app1.use(cors());
app1.use(bodyParser.urlencoded({ extended: false }));
app1.use(bodyParser.json());
app1.post('/api/userCreate', (req, res) => {
    res.json({
        data: req.body
    });
});
app1.listen(port, () => console.log(`Server listening on port ${port}!`));
