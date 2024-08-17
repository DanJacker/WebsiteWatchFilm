const express = require('express');
const mongoose = require('mongoose');
const bodyParser = require('body-parser');
const cors = require('cors');
const AuthController = require('../controllers/AuthController'); // Đảm bảo đường dẫn chính xác

const app = express();

app.use(cors({
  origin: 'http://127.0.0.1:3307',
  methods: ['GET', 'POST'],
  allowedHeaders: ['Content-Type']
}));

app.use(bodyParser.json());

mongoose.connect('mongodb://localhost:27017/User', {
  useNewUrlParser: true,
  useUnifiedTopology: true
});

const db = mongoose.connection;
db.on('error', console.error.bind(console, 'MongoDB connection error:'));
db.once('open', () => {
  console.log('Connected to MongoDB');
});

app.post('/register', AuthController.register);
app.post('/login', AuthController.login);

app.listen(3307, () => {
  console.log('Server is running on port 3307');
});
