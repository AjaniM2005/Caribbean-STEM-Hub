const express = require('express');
const mongoose = require('mongoose');
const bodyParser = require('body-parser');
const nodemailer = require('nodemailer');
const ejs = require('ejs');

const app = express();
const PORT = process.env.PORT || 3000;

// Set the view engine to EJS
app.set('view engine', 'ejs');

// Connect to MongoDB
mongoose.connect('mongodb://localhost:27017/CSH/CaribbeanSTEMHUB.Users', {
  useNewUrlParser: true,
  useUnifiedTopology: true,
});

// Middleware
app.use(bodyParser.json());

// ... (other middleware and configurations)

// Routes

// Feedback route
app.post('/submit-feedback', (req, res) => {
  // Get feedback data from the request body
  const { name, email, feedback } = req.body;

  // Create a nodemailer transporter
  const transporter = nodemailer.createTransport({
    service: 'gmail',
    auth: {
      user: 'caribbeanstemhub@gmail.com', // replace with your email
      pass: 'ajaria1119', // replace with your password
    },
  });

  // Create email content
  const mailOptions = {
    from: 'caribbeanstemhub@gmail.com', // replace with your email
    to: 'caribbeanstemhub@gmail.com', // replace with your email
    subject: 'New Feedback Submission',
    html: `<p>Name: ${name}</p><p>Email: ${email}</p><p>Feedback: ${feedback}</p>`,
  };

  // Send email
  transporter.sendMail(mailOptions, (error, info) => {
    if (error) {
      console.error(error);
      res.send('Error sending feedback');
    } else {
      console.log('Email sent: ' + info.response);
      res.send('Feedback submitted successfully');
    }
  });
});

// ... (other routes)

// Start the server
app.listen(PORT, () => {
  console.log(`Server is running on port ${PORT}`);
});
